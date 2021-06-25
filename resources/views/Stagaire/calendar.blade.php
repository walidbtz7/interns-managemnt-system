@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-content text-center">
                <h5>Modal window with input field</h5>
                <button class="btn btn-default btn-fill" id='abs'>Try me!</button>


                <br><br><br><br>


            </div>
        </div>
    </div>       
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>


<script>

    $(document).ready(function(){
        
        $('#abs').click(function () { 
            (async function getFormValues () {

                    const {value: formValues} = await Swal.fire({
                        title: 'Multiple inputs',
                        html:
                            '<input type="date" id="dateAbs" class="form-control border-input" name="dateAbs" >' +
                            '<div class="radio checked" style="width: 50%">' +
                            '<span class="icons"><span class="first-icon fa fa-circle-o fa-base"></span><span class="second-icon fa fa-dot-circle-o fa-base"></span></span>' + 
                            '<input type="radio" name="radio1" id="demi" value="option2">' + 
                            '<label for="radio2" style="padding: 0;">Demi jour</label></div>' + 
                            '<div class="radio checked" style="width: 50%">' +
                            '<span class="icons"><span class="first-icon fa fa-circle-o fa-base"></span><span class="second-icon fa fa-dot-circle-o fa-base"></span></span>' + 
                            '<input type="radio" name="radio1" id="jour" value="option2">' + 
                            '<label for="radio2" style="padding: 0;">jour</label></div>' ,

                        confirmButtonText:
                                'add absence <i class="fa fa-arrow-right></i>',
                        showCancelButton: true,

                            
                        inputValidator: ($("#dateAbs").val()) => {

                            return new Promise((resolve) => {
                                var dob = $("#dateAbs").val();

                                    if (!Date.parse(dob)) {
                                        resolve('You need to select oranges :)')

                                    } 
                                    else {
                                        resolve() 
                                    }

                            })
                        }     
                      
                        })

                        

                        if (formValues) {

                            Swal.fire("yes");
                        }

                        


            })()


        });
    });


</script>

@endsection
