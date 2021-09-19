<x-layout>
  <div class="editor-page">
    <div class="container page">
      <div class="row">
        <div class="col-md-10 offset-md-1 col-xs-12">
          <x-validation-errors />
          <form method="POST" action="{{ route('articles.store') }}">
            @method('POST')
            @csrf
            <fieldset>
              <fieldset class="form-group">
                <input name="title" type="text" class="form-control form-control-lg" placeholder="Article Title"
                  value="{{ old('title') }}">
              </fieldset>
              <fieldset class="form-group">
                <input name="description" type="text" class="form-control" placeholder="What's this article about?"
                  value="{{ old('description') }}">
              </fieldset>
              <fieldset class="form-group">
                <textarea name="body" class="form-control" rows="8"
                  placeholder="Write your article (in markdown)">{{ old('body') }}</textarea>
              </fieldset>
              <x-tags-input :tags="[]" />
              <button class="btn btn-lg pull-xs-right btn-primary">
                Publish Article
              </button>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-layout>
