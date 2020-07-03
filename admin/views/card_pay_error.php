 <h1 class="title">Ops! An Error Occurred!</h1>
                    <p> An Error Occurred Making Payment Unsuccessful. Please Try Again.</p>
                    <p>
                        <?php
                            if (isset($_GET['error'])) {
                                echo $_GET['error'];
                            }
                        ?>
                    </p>