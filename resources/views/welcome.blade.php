<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <title>Your Eligibility</title>
    <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background: darkgray;
            }
            .card
            {
                background: gray;
            }
            label, .subj
            {
                color: #fff;
            }           
        </style>
</head>
<body class="antialiased">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <div class="container card">
            <div class="card-header text-center">Finding Your Eligible Subject(s)</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="s1">Have you Mathematics in your H.S.C. level?</label>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="math" id="hscMath" value="1">
                                <label class="form-check-label" for="s1">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="math" id="hscMath" value="0">
                                <label class="form-check-label" for="s1">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="s2">Have you Biology in your H.S.C. level?</label>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="bio" id="hscBiology" value="1">
                                <label class="form-check-label" for="s2">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="bio" id="hscBiology" value="0">
                                <label class="form-check-label" for="s2">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="MathScore" class="col-sm-2 col-form-label">Math Number</label>
                        <div class="col-sm-10">
                        <input type="number" class="form-control" id="MathScore" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="PhyScore" class="col-sm-2 col-form-label">Physics Number</label>
                        <div class="col-sm-10">
                        <input type="number" class="form-control" id="PhyScore" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ChemScore" class="col-sm-2 col-form-label">Chemistry Number</label>
                        <div class="col-sm-10">
                        <input type="number" class="form-control" id="ChemScore" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="BioScore" class="col-sm-2 col-form-label">Biology Number</label>
                        <div class="col-sm-10">
                        <input type="number" class="form-control" id="BioScore" required>
                        </div>
                    </div>
                    <button id="check" class="btn btn-success">Checker</button>
                </div>
                <hr>
                <h5 class="text-center">Your Eligible Subject(s) List</h5><hr>
                <div id="output">
                    
                </div>
            </div>           
        </div>
    </div>  
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    
    $(document).ready(function () {
        
        $('#check').on('click', function(){
            $('#output').empty();

            var hscMath = $("#hscMath:checked").val();
            var hscBiology = $("#hscBiology:checked").val();
 
            var MathScore = $('#MathScore').val();
            var PhyScore = $('#PhyScore').val();
            var BioScore = $('#BioScore').val();
            var ChemScore = $('#ChemScore').val();
            $.ajax({
                type: "POST",
                url: "http://127.0.0.1:8000/api/yourEligibiilty",
                data: {
                    hsc_mathematics_subj: hscMath,
                    hsc_biology_subj: hscBiology,
                    admission_mathematics_marks: MathScore,
                    admission_physics_marks: PhyScore,
                    admission_chemistry_marks: ChemScore,
                    admission_biology_marks: BioScore
                },

                success: function (response) {
                    var d = '';
                    for (let index = 0; index < response['subj'].length; index++) {
                        d += '<h5 class="subj text-center">'+response['subj'][index]+'</h5>';
                    }
                    $('#output').prepend(d);
                    
                }
            });
        });

    });
</script>
</html>