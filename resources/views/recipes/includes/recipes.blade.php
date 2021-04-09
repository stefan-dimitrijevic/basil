<div class="row d-lg-flex justify-content-lg-center my-3 recipes">
    @foreach($recipes as $recipe)
        <div class="col-md-6 col-xl-4 my-5 align-self-end">
            <div class="d-flex">
                <a class="mx-auto" href="{{ route('recipes.show', $recipe->id) }}"><img class="img-fluid" src="{{ asset('assets/img/' . $recipe->image) }}"></a>
            </div>
            <h2 class="text-center my-3">
                <a class="recipe-heading" href="{{ route('recipes.show', $recipe->id) }}">{{ $recipe->name }}</a>
            </h2>
        </div>
    @endforeach
</div>
<div class="row">
    <div class="col">
        <nav class="d-flex justify-content-center justify-content-xl-center align-items-xl-center">
            {{ $recipes->links() }}
        </nav>
    </div>
</div>
