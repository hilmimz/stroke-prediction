<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Stroke Prediction</title>
</head>
<body>
    <section class="h-auto min-vh-150 bg-gray-900">
        <div class="container py-5 h-100 ">
            <div class="row d-flex justify-content-center align-items-center h-100 ">
                <div class="col col-lg-9 col-xl-7 ">
                    <div class="card rounded-3 shadow-lg p-3 mb-5 bg-white rounded">
                        <div class="card-body p-4">
                            <h4 class="text-center my-3 pb-3">Prediksi Stroke</h4>
                            <h6 class="text-center my-3 pb-3">Dengan Gaussian Naive Bayes</h6>
                            <form action="{{ route('predict') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                <label for="age" class="form-label">Age</label>
                                <input type="number"  class="form-control" id="age" name="age" value="{{ (isset($_POST["submit"]))? $age : '' }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="hypertension" class="form-label">Memiliki riwayat hipertensi?</label>
                                    <select name="hypertension" id="hypertension" name="hypertension" class="form-select" aria-label="Default select example">
                                        <option value="0" {{ (isset($_POST["submit"]) && $hypertension == 0)? 'selected' : '' }}>Tidak</option>
                                        <option value="1" {{ (isset($_POST["submit"]) && $hypertension == 1)? 'selected' : '' }}>Ya</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="heart_disease">Memiliki riwayat sakit jantung?</label>
                                    <select name="heart_disease" id="heart_disease" name="heart_disease" class="form-select" >
                                    <option value="0" {{ (isset($_POST["submit"]) && $heart_disease == 0)? 'selected' : '' }}>Tidak</option>
                                    <option value="1" {{ (isset($_POST["submit"]) && $heart_disease == 1)? 'selected' : '' }}>Ya</option>
                                </select>
                                </div>
                                <div class="mb-3">
                                    <label for="avg_glucose_level">Rata-rata nilai glukosa</label>
                                    <input type="number" step="any" class="form-control" id="avg_glucose_level" name="avg_glucose_level" value="{{ (isset($_POST["submit"]))? $avg_glucose_level : '' }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="bmi">Indeks Massa Tubuh (BMI)</label>
                                    <input type="number" step="any" class="form-control" id="bmi" name="bmi" value="{{ (isset($_POST["submit"]))? $bmi : '' }}" required>
                                </div>
                                <button type="submit" value="Cek" name="submit" class="btn btn-primary" data-bs-target="#exampleModal" data-bs-toggle="modal">Cek</button>
                                <form action="{{ route('reset') }}" method="post">
                                    <button type="submit" class="btn btn-danger">Reset</button>
                                </form>
                        
                                            @isset($_POST["submit"])
                                            <h5 class="mt-3">Hasil</h5>
                                            <p>{{ ($result == 1)? 'Stroke' : 'Tidak Stroke' }}</p>
                                            <span id="show" class="" style="text-decoration: underline">
                                                <a href="#" class="fill-div" style="width: 100px;">
                                                Show details
                                                </a>
                                            </span>
                        
                                            <div id="info" style="display:none; margin-left:2em">
                                                <i>Class stroke 0:</i> <br>
                                                <i>f(age) = {{ $age0 }}</i><br>
                                                <i>f(hypertension) = {{ $hypertension0 }}</i><br>
                                                <i>f(heart_disease) = {{ $heart_disease0 }}</i><br>
                                                <i>f(avg_glucose_level) = {{ $avg_glucose_level0 }}</i><br>
                                                <i>f(bmi) = {{ $bmi0 }}</i><br>
                                                <i>f(class0) = {{ $class0 }}</i><br><br>
                                                <i>Class stroke 1:</i> <br>
                                                <i>f(age) = {{ $age1 }}</i><br>
                                                <i>f(hypertension) = {{ $hypertension1 }}</i><br>
                                                <i>f(heart_disease) = {{ $heart_disease1 }}</i><br>
                                                <i>f(avg_glucose_level) = {{ $avg_glucose_level1 }}</i><br>
                                                <i>f(bmi) = {{ $bmi1 }}</i><br>
                                                <i>f(class1) = {{ $class1 }}</i><br><br>
                                            </div>
                                            <script>
                                                $(document).ready(function() {
                                                $('#show').click(function() {
                                                    $('#info').toggle();
                                                    var visible = $('#info').is(":visible");
                                                if(visible){
                                                $('a',this).html('Hide details');
                                                }else{
                                                    $('a',this).html('Show details');}
                        
                                                        });
                                                    });
                                            </script>
                                            @endisset
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>