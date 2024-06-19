@extends('layouts.app')

@section('title', 'Общий Чат')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Общий Чат</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div>
        <form id="message-form">
            @csrf
            <div class="form-group">
                <textarea name="body" id="message-body" rows="3" placeholder="Введите ваше сообщение здесь" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Отправить Сообщение</button>
            </div>
        </form>
    </div>
    <h2 class="mt-4">Сообщения</h2>
    <div id="messages" class="list-group">
        @foreach ($messages as $message)
            <div class="list-group-item">
                <p>{{ $message->body }}</p>
                <p>Отправлено {{ $message->user->name }} в {{ $message->created_at->format('d M Y, H:i') }}</p>
                @if ($message->user_id == Auth::id() || Auth::user()->is_admin)
                    <a href="{{ route('messages.edit', $message->id) }}" class="btn btn-secondary btn-sm">Редактировать</a>
                    <form method="POST" action="{{ route('messages.destroy', $message->id) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>

    <div class="mt-4">
        <button id="load-more" class="btn btn-primary">Загрузить еще</button>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const messageForm = document.getElementById('message-form');
        const messageBody = document.getElementById('message-body');
        const messagesContainer = document.getElementById('messages');
        let currentPage = 1;

        messageForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(messageForm);
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '{{ route('messages.store') }}', true);
            xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

            xhr.onload = function() {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    const newMessage = `
                        <div class="list-group-item">
                            <p>${response.body}</p>
                            <p>Отправлено ${response.user.name} в ${new Date(response.created_at).toLocaleString()}</p>
                            ${response.user_id == {{ Auth::id() }} || {{ Auth::user()->is_admin }} ? `
                                <a href="/messages/${response.id}/edit" class="btn btn-secondary btn-sm">Редактировать</a>
                                <form method="POST" action="/messages/${response.id}" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                                </form>
                            ` : ''}
                        </div>
                    `;
                    messagesContainer.insertAdjacentHTML('afterbegin', newMessage);
                    messageBody.value = '';
                }
            };

            xhr.send(formData);
        });

        function fetchMessages(page) {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', `{{ route('messages.fetch') }}?page=${page}`, true);

            xhr.onload = function() {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    response.data.forEach(function(message) {
                        const messageElement = `
                            <div class="list-group-item">
                                <p>${message.body}</p>
                                <p>Отправлено ${message.user.name} в ${new Date(message.created_at).toLocaleString()}</p>
                                ${message.user_id == {{ Auth::id() }} || {{ Auth::user()->is_admin }} ? `
                                    <a href="/messages/${message.id}/edit" class="btn btn-secondary btn-sm">Редактировать</a>
                                    <form method="POST" action="/messages/${message.id}" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                                    </form>
                                ` : ''}
                            </div>
                        `;
                        messagesContainer.insertAdjacentHTML('beforeend', messageElement);
                    });

                    if (!response.next_page_url) {
                        document.getElementById('load-more').style.display = 'none';
                    }
                }
            };

            xhr.send();
        }

        document.getElementById('load-more').addEventListener('click', function() {
            currentPage++;
            fetchMessages(currentPage);
        });

        fetchMessages(currentPage);
    });
</script>
@endsection