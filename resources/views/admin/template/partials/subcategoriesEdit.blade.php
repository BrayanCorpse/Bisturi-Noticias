<div class="dropdown mt-3">
    <a class="btn btn-dark rounded-circle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-bars" aria-hidden="true" style="color: #ffff"></i>
    </a>
    <sub>Subcategorías</sub>
    <div class="dropdown-menu mt-3" aria-labelledby="dropdownMenuButton">
        <h5 class="text-center mt-3">Subcategorías</h5>
        <div class="col" id="subcategories">
                <div class="form-check">
                    <input class="form-check-input"
                           type="radio" 
                           name="subcategoria" 
                           value="{{$article->subcategoria}}" 
                           checked>
                    <label class="form-check-label mb-2" for="subcategoria">
                        {{$article->subcategoria}}
                    </label>
                </div>
                @foreach ($subcategories->where('category_id','==',$article->category->id) as $subcategory)
                    @if ($subcategory->name != $article->subcategoria)
                        <div class="form-check">
                            <input class="form-check-input" 
                                   type="radio" 
                                   name="subcategoria" 
                                   id="subcategoria" 
                                   value="{{$subcategory->name}}" 
                                   {{ old('subcategoria') == $subcategory->name ? 'checked' : '' }}>
                            <label class="form-check-label mb-2" for="subcategoria">
                            {{$subcategory->name}}
                            </label>
                        </div>                             
                    @endif
                @endforeach
        </div>
    </div>
</div>
    
<script>

    function selectSubcategory() {

        let category = document.querySelector('input[name="category_id"]:checked').value;
        let subcategories = document.getElementById('subcategories');

        if (category == 15){
            subcategories.innerHTML =
            ` @foreach ($subcategories->where('category_id', 15) as $subcategory)
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="subcategoria" id="subcategoria" value="{{$subcategory->name}}" {{ old('subcategoria') == $subcategory->name ? 'checked' : '' }}>
                    <label class="form-check-label mb-2" for="subcategoria">
                    {{$subcategory->name}}
                    </label>
                </div>
            @endforeach`;
        }
        else if (category == 16){
            subcategories.innerHTML =
            ` @foreach ($subcategories->where('category_id', 16) as $subcategory)
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="subcategoria" id="subcategoria" value="{{$subcategory->name}}" {{ old('subcategoria') == $subcategory->name ? 'checked' : '' }}>
                    <label class="form-check-label mb-2" for="subcategoria">
                    {{$subcategory->name}}
                    </label>
                </div>
            @endforeach`;

        }
        else if (category == 17){
            subcategories.innerHTML =
            ` @foreach ($subcategories->where('category_id', 17) as $subcategory)
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="subcategoria" id="subcategoria" value="{{$subcategory->name}}" {{ old('subcategoria') == $subcategory->name ? 'checked' : '' }}>
                    <label class="form-check-label mb-2" for="subcategoria">
                    {{$subcategory->name}}
                    </label>
                </div>
            @endforeach`;

        }
        else if (category == 18){
            subcategories.innerHTML =
            ` @foreach ($subcategories->where('category_id', 18) as $subcategory)
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="subcategoria" id="subcategoria" value="{{$subcategory->name}}" {{ old('subcategoria') == $subcategory->name ? 'checked' : '' }}>
                    <label class="form-check-label mb-2" for="subcategoria">
                    {{$subcategory->name}}
                    </label>
                </div>
            @endforeach`;

        }
        else{
            subcategories.innerHTML = '<span class="badge badge-info">Continua sin una Categoría!</span>';

        }


    }

        
</script>
