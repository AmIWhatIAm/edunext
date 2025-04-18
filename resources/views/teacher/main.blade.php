@extends('layouts.app')

@section('content')
<div class = "container">
    <div class="row">
        <div class="col-md-3">
            <h4>Subjects</h4>
            <ul class="list-group">
                @foreach($subjects as $subject)
                <li class="list-group-item subject-item" data-id="{{$subject->id}}">
                    {{$subject->name}}
                </li>
                @endforeach
            </ul>
        </div>

        <div class="col-md-9">
            <div id="topics-area"></div>
            <div id="topic-content" class="mt-3"></div>
            <a href="{{ route('upload.page') }}" class="btn btn-primary mt-3"> ➕ Add Content</a>
        </div>
    </div>
</div>

<script>
    const subjectItems = document.querySelectorAll('.subject-item');
    subjectItems.forEach(item => {
        item.addEventListener('click', async () => {
            let id = item.getAttribute('data-id');
            let res = await fetch(`/subject/${id}`)
            let topics = await res.json();

            let topicHTML = `<ul class="list-group mt-3">`;
            topics.forEach(t => {
                topicHTML += `<li class="list-group-item topic-item" data-id="${t.id}">${t.title}</li>`;
            });
            topicHTML += `</ul>`;

            document.getElementById('topics-area').innerHTML = topicHTML;

            document.querySelectorAll('.topic-item').forEach(topic => {
                topic.addEventListener('click', async () => {
                    let topicId = topic.getAttribute('data-id');
                    let res = await fetch(`/topic/${topicId}`);
                    let data = await res.json();
                    document.getElementById('topic-content').innerHTML = `<h5>${data.title}</h5><p>${data.content}</p>`;
                });
            });
        });
    });
</script>
@endsection