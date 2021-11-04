<?php 
    $title = "faq";
?>
<?php include('include/header.php'); ?>

<section class='faq-section py-4 mt-4'>
    <div class="container">
        <h2 class="text-center mb-4">Aclará tus dudas sobre la donación de sangre.</h2>

        <div class="row">

            <div class="col-12 col-md-6">
                <img src="img/im1.jpg" alt="" class="img-fluid">
            </div>

            <div class="col-12 col-md-6">
                <!-- ACCORDION -->
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                ¿Por qué donar sangre?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="faq-text">Porque no se puede fabricar. Sólo se consigue mediante personas
                                    solidarias dispuestas a donarla.
                                    Por eso, para que nunca falte, son imprescindibles las donaciones regulares.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                ¿Por qué es importante la donación voluntaria de sangre?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul>
                                    <li>Para contar con sangre segura.</li>
                                    <li>Para que la sangre esté siempre disponible cuando se necesite.</li>
                                    <li>Para evitar que el paciente y su entorno deban encontrar donantes.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                ¿Con qué frecuencia se puede donar sangre?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="faq-text">Se puede donar sangre con un intervalo mínimo de 2 meses. Los
                                    hombres pueden donar hasta 4 veces en un año y las mujeres, 3.</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                ¿Es necesario estar en ayunas para donar?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="faq-text">No. La idea es que desayunes normalmente y tomes abundante líquido
                                    antes y después de la donación.</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="headingFive">
                                ¿Qué se recomienda tener presente para el día de la donación?
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="faq-text">Estar descansado. Concurrir con ropa cómoda. Presentarse con D.N.I.
                                    Generalmente luego de realizar la donación se puede continuar con las actividades
                                    habituales.</p>
                            </div>
                        </div>
                    </div>

                </div>
                <!--  FIN ACCORDION -->
            </div>

        </div>

        <!-- SEGUNDA FILA -->
        <div class="row mt-5">

            <div class="col-12 col-md-6 order-md-1">
                <img src="img/im2.jpg" alt="" class="img-fluid">
            </div>

            <div class="col-12 col-md-6">
                <!-- ACCORDION -->
                <div class="accordion" id="accordionExample2">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSix">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                                ¿Se puede donar sangre si se consumen drogas?
                            </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse show" aria-labelledby="headingSix"
                            data-bs-parent="#accordionExample2">
                            <div class="accordion-body">
                                <p class="faq-text">Por el consumo de drogas, será la evaluación médica la que determine si se puede o no donar.
                                </p>
                            </div>
                        </div>
                    </div>


                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSeven">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                ¿Puedo donar si estoy tomando alguna medicación?
                            </button>
                        </h2>
                        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                            data-bs-parent="#accordionExample2">
                            <div class="accordion-body">
                                <p class="faq-text">Las personas que están tomando antibióticos, anticoagulantes, medicamentos oncológicos o insulina no pueden donar.
El resto de los medicamentos serán evaluados en la consulta pre-donación en función de la enfermedad para la cual se prescribieron y no por el medicamento en sí mismo.
</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingEight">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                ¿Qué enfermedades se pueden transmitir por la sangre?
                            </button>
                        </h2>
                        <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight"
                            data-bs-parent="#accordionExample2">
                            <div class="accordion-body">
                                <p class="faq-text">La mayor parte de las enfermedades infecciosas pueden transmitirse por sangre. Por ello, todas las unidades donadas son analizadas antes de ser utilizadas. En nuestro país se realizan pruebas para descartar Hepatitis B y C, VIH-Sida, HTLV I y II, sífilis, brucelosis y Chagas.</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingNine">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseNine" aria-expanded="false" aria-controls="headingNine">
                                ¿La sangre donada por una persona puede servir para cualquier otra?
                            </button>
                        </h2>
                        <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine"
                            data-bs-parent="#accordionExample2">
                            <div class="accordion-body">
                                <p class="faq-text">Cada uno de nosotros nace con un tipo de sangre, los Grupos A, B, AB, 0 y el factor Rh Positivo o Negativo son los que se consideran para la búsqueda de sangre compatible. Por esta condición genética, nuestro organismo solo puede recibir la sangre de grupos compatibles.</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTen">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                ¿Dónde me puedo informar para ir a donar sangre?
                            </button>
                        </h2>
                        <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen"
                            data-bs-parent="#accordionExample2">
                            <div class="accordion-body">
                            <p class="faq-text">Podes informarte llamando al 0800-222-1002. Ahí podrás consultar lugares, fechas y horarios de atención en todo el país.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
                <!--  FIN ACCORDION -->
            </div>

        </div>


    </div>
</section>

<?php include('include/footer.php'); ?>