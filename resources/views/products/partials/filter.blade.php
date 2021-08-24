<form action="{{ route('products') }}" method="post">
    {!! csrf_field() !!}

    <div class="filter">
        <div class="row">
            <h5 class="color-primary">Filtreler</h5>

            <div class="col-lg-12">

                <div class="filter-category">
                    <h6>Kategori</h6>
                    <div class="row mt1">
                        <div class="col-lg-12">
                            @if (Request::input('category') || Request::input('sub_category'))
                                <ul>
                                    <li><input type="checkbox" class="category-checkbox" name="category" value="{{ $category->id }}" checked>{{ $category->name }}
                                        <ul>
                                            @foreach ($category->subCategories as $sub_cat)
                                                <li><input type="checkbox" class="sub-category-checkbox" name="sub_category" {{ Request::input('sub_category') == $sub_cat->id ? 'checked' : '' }} value="{{ $sub_cat->id }}">{{ $sub_cat->name }}
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            @else
                                <ul>
                                    @foreach ($categories as $cat)
                                        <li>
                                            <label>{{ $cat->name }}
                                                <input type="checkbox" class="category-checkbox" name="category" value="{{ $cat->id }}">
                                            </label>
                                            <ul>
                                                @foreach ($cat->subCategories as $sub_cat)
                                                    <li>
                                                        <label>
                                                            {{ $sub_cat->name }}
                                                            <input type="checkbox" class="sub-category-checkbox" name="sub_category" value="{{ $sub_cat->id }}">
                                                        </label>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach


                                </ul>
                            @endif


                        </div>
                    </div>
                </div>

                <div class="filter-price">
                    <h6>{{ __("Fiyat Aralığı") }}</h6>
                    <div class="row mt1">
                        <div class="col-lg-6 col-6">
                            <input type="text" name="price-min" class="form-control" placeholder="{{ __("En Az") }}" value="{{ Request::input('price-min') ?? '' }}">
                        </div>
                        <div class="col-lg-6 col-6">
                            <input type="text" name="price-max" class="form-control" placeholder="{{ __("En Çok") }}" value="{{ Request::input('price-max') ?? '' }}">
                        </div>

                    </div>
                </div>

                <div class="filter-gender">
                    <h6>Cinsiyet</h6>
                    <div class="row mt1">
                        <div class="col-lg-12">
                            <ul>
                                <li>
                                    <label>
                                        {{ __("Erkek") }}
                                        <input type="checkbox" name="gender" {{ Request::input('gender') == 'male' ? 'checked' : ''}} value="male">
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        {{ __("Kız") }}
                                        <input type="checkbox" name="gender" {{ Request::input('gender') == 'female' ? 'checked' : ''}} value="female">
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        {{ __("Unisex") }}
                                        <input type="checkbox" name="gender" {{ Request::input('gender') == 'unisex' ? 'checked' : ''}} value="unisex">
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <button class="btn primary-button" type="submit">{{ __("Uygula") }}</button>

            </div>
        </div>
    </div>

</form>
