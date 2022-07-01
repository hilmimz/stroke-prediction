<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Stroke Prediction</title>
</head>
<body>
<div class="container">
    <h1 class="text-center">Stroke Prediction App</h1>
    <br>
    <form action="{{ route('predict') }}" method="post">
        @csrf
        <div class="mb-3">
          <label for="age" class="form-label">Age</label>
          <input type="number"  class="form-control" id="age" name="age" value="{{ (isset($age))? $age : '' }}">
        </div>
        <div class="mb-3">
            <label for="hypertension" class="form-label">Memiliki riwayat hipertensi?</label>
            <select name="hypertension" id="hypertension" name="hypertension" class="form-select" aria-label="Default select example">
                <option value="0" {{ (isset($hypertension) && $hypertension == 0)? 'selected' : '' }}>Tidak</option>
                <option value="1" {{ (isset($hypertension) && $hypertension == 1)? 'selected' : '' }}>Ya</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="heart_disease">Memiliki riwayat sakit jantung?</label>
            <select name="heart_disease" id="heart_disease" name="heart_disease" class="form-select">
            <option value="0" {{ (isset($heart_disease) && $heart_disease == 0)? 'selected' : '' }}>Tidak</option>
            <option value="1" {{ (isset($heart_disease) && $heart_disease == 1)? 'selected' : '' }}>Ya</option>
        </select>
        </div>
        <div class="mb-3">
            <label for="avg_glucose_level">Rata-rata nilai glukosa</label>
            <input type="number" class="form-control" id="avg_glucose_level" name="avg_glucose_level" value="{{ (isset($avg_glucose_level))? $avg_glucose_level : '' }}">
        </div>
        <div class="mb-3">
            <label for="bmi">Indeks Massa Tubuh (BMI)</label>
            <input type="number" class="form-control" id="bmi" name="bmi" value="{{ (isset($bmi))? $bmi : '' }}">
        </div>

        <button type="submit" value="Cek" name="submit" class="btn btn-primary" data-bs-target="#exampleModal" data-bs-toggle="modal">Cek</button>
    
                    @isset($result)
                    <h4 class="text-center">Hasil</h4>
                    <p class="text-center">{{ ($result == 1)? 'Stroke' : 'Tidak Stroke' }}</p>
                    @endisset
      </form>

    {{-- <form action="{{ route('predict') }}" method="post">
        @csrf

        
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
        
    </form> --}}
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>