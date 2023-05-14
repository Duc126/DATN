       <div class="form-group">
           <label for="parent_id">{{ __('messages.category.section_category') }} :</label>
           <select name="parent_id" id="parent_id" class="form-control">
               <option value="0" @if (isset($category['parent_id']) && $category['parent_id'] == 0) selected="" @endif>{{ __('Danh Mục Chính') }}
               </option>
               @if (!empty($getCategories))
                   @foreach ($getCategories as $parent_category)
                       <option value="{{ $parent_category['id'] }}" @if (isset($category['parent_id']) && $category['parent_id'] == $parent_category['id']) selected="" @endif>
                           {{ $parent_category['category_name'] }}</option>
                       @if (!empty($parent_category['subcategories']))
                           @foreach ($parent_category['subcategories'] as $subCategories)
                               <option value="{{ $subCategories['id'] }}"
                                   @if (isset($subCategories['parent_id']) && $subCategories['parent_id'] == $subCategories['id']) selected="" @endif>&nbsp;&rtrif;&nbsp;
                                   {{ $subCategories['category_name'] }}</option>
                           @endforeach
                       @endif
                   @endforeach
               @endif
           </select>
       </div>
