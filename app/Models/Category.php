<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id')->select('id', 'name');
    }
    public function parentcategory()
    {
        return $this->belongsTo(Category::class, 'parent_id')->select('id', 'category_name');
    }
    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_id')->where('status', 1);
    }
    public static function categoryDetails($url)
    {
        $categoryDetails = Category::select('id', 'parent_id', 'category_name', 'url', 'description')->with(['subcategories' => function ($query) {
            $query->select('id', 'parent_id', 'category_name', 'url', 'description');
        }])->where('url', $url)->first()->toArray();
        $catIds = array();
        $catIds[] = $categoryDetails['id'];
        if ($categoryDetails['parent_id'] == 0) {
            $breandCrumbs = '<li class="has-separator">
            <a href="' . url($categoryDetails['url']) . '">' . $categoryDetails['category_name'] . '</a>
        </li>';
        } else {
            $parentCategory = Category::select('category_name', 'url')
                ->where('id', $categoryDetails['parent_id'])->first()->toArray();
            $breandCrumbs = '<li class="has-separator">
            <a href="' . url($parentCategory['url']) . '">' . $parentCategory['category_name'] . '</a>
            </li>
            <li class="has-separator">
            <a href="' . url($categoryDetails['url']) . '">' . $categoryDetails['category_name'] . '</a>
        </li>';
        }
        foreach ($categoryDetails['subcategories'] as $key => $subCat) {
            $catIds[] = $subCat['id'];
        }
        $resp = array('catIds' => $catIds, 'categoryDetails' => $categoryDetails, 'breandCrumbs' => $breandCrumbs);
        return $resp;
    }
}
