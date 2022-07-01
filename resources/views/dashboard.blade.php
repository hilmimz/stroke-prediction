<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stroke Prediction</title>
</head>
<body>
    <h1>Stroke Prediction App</h1>
    <form action="{{ route('predict') }}" method="post">
        @csrf
        <label for="age">Umur</label>
        <input type="number" id="age" name="age" value="{{ (isset($age))? $age : '' }}">
        <br>
        <label for="hypertension">Memiliki riwayat hipertensi?</label>
        <select name="hypertension" id="hypertension" name="hypertension">
            <option value="0" {{ (isset($hypertension) && $hypertension == 0)? 'selected' : '' }}>Tidak</option>
            <option value="1" {{ (isset($hypertension) && $hypertension == 1)? 'selected' : '' }}>Ya</option>
        </select>
        <br>
        <label for="heart_disease">Memiliki riwayat sakit jantung?</label>
        <select name="heart_disease" id="heart_disease" name="heart_disease">
            <option value="0" {{ (isset($heart_disease) && $heart_disease == 0)? 'selected' : '' }}>Tidak</option>
            <option value="1" {{ (isset($heart_disease) && $heart_disease == 1)? 'selected' : '' }}>Ya</option>
        </select>
        <br>
        <label for="avg_glucose_level">Rata-rata nilai glukosa</label>
        <input type="number" id="avg_glucose_level" name="avg_glucose_level" value="{{ (isset($avg_glucose_level))? $avg_glucose_level : '' }}">
        <br>
        <label for="bmi">Indeks Massa Tubuh (BMI)</label>
        <input type="number" id="bmi" name="bmi" value="{{ (isset($bmi))? $bmi : '' }}">

        <input type="submit" value="Cek" name="submit">
        
        @isset($result)
        <h4>Hasil</h4>
        <p>{{ ($result == 1)? 'Stroke' : 'Tidak Stroke' }}</p>
        @endisset
        
    </form>

</body>
</html>