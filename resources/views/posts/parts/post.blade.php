<div class="form-group">
    <input name="title" class="form-control" type="text" required value="{{ $post->title ?? '' }}">
</div>
<div class="form-group">
    <textarea name="desc" rows="10" class="form-control" required>{{ $post->desc ?? '' }}</textarea>
</div>
<div class="form-group">
    <input name="img" type="file">
</div>
