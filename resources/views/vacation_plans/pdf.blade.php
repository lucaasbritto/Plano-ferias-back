<!DOCTYPE html>
<html>
<head>
    <title>Resumo do Plano de Férias</title>
</head>
<body>
    <h1>{{ $vacationPlan->title }}</h1>
    <p><strong>Descrição:</strong> {{ $vacationPlan->description }}</p>
    <p><strong>Data:</strong> {{ $vacationPlan->date }}</p>
    <p><strong>Local:</strong> {{ $vacationPlan->location }}</p>
    
    @if(!empty($vacationPlan->participants))
    @php
        // Convertendo a string de participantes em um array
        $participantsArray = is_string($vacationPlan->participants) ? explode(',', $vacationPlan->participants) : $vacationPlan->participants;
    @endphp

    <p><strong>Participantes:</strong></p>
    <ul>
        @foreach($participantsArray as $participant)
            <li>{{ $participant }}</li>
        @endforeach
    </ul>
@endif
</body>
</html>