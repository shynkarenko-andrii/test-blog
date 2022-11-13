<form action="/editpost/{{$post->id}}" method="post">
    {{  csrf_field() }}
    //method field is used to tell the browser that this "post" is actually a patch request
    {{ method_field('PATCH') }}
    // Here goes the edit form that can be exactly like your create post but with the values of the post you are editing
</form>
