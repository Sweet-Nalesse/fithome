<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить тренировку в расписание</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">Добавить тренировку в расписание</h1>
        
        <form id="scheduleForm">
            <div class="mb-4">
                <label for="workout_id" class="block text-sm font-medium text-gray-700">Тренировка</label>
                <select name="workout_id" id="workout_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @foreach ($workouts as $workout)
                        <option value="{{ $workout->id }}">{{ $workout->title }}</option> <!-- Измените 'name' на 'title' -->
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="date" class="block text-sm font-medium text-gray-700">Дата</label>
                <input type="date" name="date" id="date" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="time" class="block text-sm font-medium text-gray-700">Время</label>
                <input type="time" name="time" id="time" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email для уведомления</label>
                <input type="email" name="email" id="email" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div>
                <button type="button" id="submitBtn" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Добавить и отправить уведомление</button>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#submitBtn').click(function() {
                let formData = {
                    workout_id: $('#workout_id').val(),
                    date: $('#date').val(),
                    time: $('#time').val(),
                    email: $('#email').val(),
                    _token: '{{ csrf_token() }}'
                };

                $.ajax({
                    url: '{{ route('schedules.store') }}',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        alert('Тренировка добавлена в расписание и уведомление отправлено.');
                    },
                    error: function(response) {
                        alert('Произошла ошибка при добавлении тренировки.');
                    }
                });
            });
        });
    </script>
</body>
</html>
