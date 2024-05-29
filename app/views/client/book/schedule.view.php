<?php include PATH . 'client/partials/header.php' ?>

<style>

</style>

<div class="container mt-3 my-auto rounded shadow bg-white">
    <div>
        <div class="p-1 d-flex">
            <form action="<?= ROOT ?>/client/confirm" method="POST" class="w-50 mx-auto" enctype="multipart/form-data">

                <?php if (!is_null($selected_service) && is_object($selected_service)) { ?>
                    <!-- HIDDEN -->
                    <input type="hidden" name="image" value="<?= $selected_service->image ?>">
                    <input type="hidden" name="name" value="<?= $selected_service->name ?>">
                    <input type="hidden" name="price" value="<?= $selected_service->price ?>">
                    <div class="container mt-3" id="<?= $selected_service->id ?>">

                        <div class="alert alert-danger alert-dismissible fade show d-none" role="alert" id="errorAlert">
                            <div id="response"></div>
                        </div>

                        <!-- IMAGE -->
                        <div class="m-3" style="height: 220px; width: 220px">
                            <img class="rounded" src="<?= ROOT . "/" . $selected_service->image ?>" alt="" srcset="" style="width: 100%; height: 100%; object-fit:cover; object-position: center;">
                        </div>
                        <div class="m-3 w-75">
                            <div class="fs-1 d-flex justify-content-between">

                                <!-- NAME AND PRICE -->
                                <div><?= $selected_service->name ?></div>
                                <div>₱<?= $selected_service->price ?></div>
                            </div>
                            <div class="my-3 fs-6">
                                <div class="my-3">

                                    <!-- DATE -->
                                    <div>Select your date:</div>
                                    <input type="date" name="date" id="datePicker" class="form-control" required>
                                </div>
                                <div class="my-3">

                                    <!-- TIME -->
                                    <div>Select starting time available:</div>
                                    <select name="time" class="form-select">
                                        <option value="08:00:00-09:00:00">8:00 am - 9:00 am</option>
                                        <option value="09:00:00-10:00:00">9:00 am - 10:00 am</option>
                                        <option value="10:00:00-11:00:00">10:00 am - 11:00 am</option>
                                        <option value="12:00:00-13:00:00">12:00 pm - 1:00 pm</option>
                                        <option value="13:00:00-14:00:00">1:00 pm - 2:00 pm</option>
                                        <option value="14:00:00-15:00:00">2:00 pm - 3:00 pm</option>
                                        <option value="15:00:00-16:00:00">3:00 pm - 4:00 pm</option>
                                        <option value="16:00:00-17:00:00">4:00 pm - 5:00 pm</option>
                                    </select>
                                    <div class="my-3">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex rounded justify-content-center align-items-center px-3" style="background-color: #ececec;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="payment" id="cash" value="Cash">
                                                    <label class="form-check-label" for="Cash">
                                                        Cash
                                                    </label>
                                                </div>
                                                <div class="form-check mx-3">
                                                    <input class="form-check-input" type="radio" name="payment" id="gcash" value="Gcash">
                                                    <label class="form-check-label" for="Gcash">
                                                        Gcash
                                                    </label>
                                                </div>
                                            </div>

                                            <div>
                                                <button class="btn btn-primary" type="submit" name="process">process</button>
                                                <a class="btn btn-danger" href="<?= ROOT ?>/client/book">cancel</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </form>
        </div>
    </div>
</div>


<script>
    // DISABLE PAST DATES AND SUNDAYS
    $(document).ready(function() {

        function isPastDate(date) {
            var today = new Date();
            today.setHours(0, 0, 0, 0);
            var inputDate = new Date(date);
            return inputDate < today;
        }

        function isToday(date) {
            var today = new Date();
            today.setHours(0, 0, 0, 0);
            var inputDate = new Date(date);
            inputDate.setHours(0, 0, 0, 0);
            return inputDate.getTime() === today.getTime();
        }

        function isSunday(date) {
            var inputDate = new Date(date);
            return inputDate.getDay() === 0;
        }

        // PAST DATES
        $("#datePicker").change(function() {
            var selectedDate = $(this).val();
            if (isPastDate(selectedDate)) {
                $('#errorAlert').removeClass('d-none');
                $("#response").text("Please select a future date.");
                $(this).val('');
                setTimeout(function() {
                    $('#errorAlert').addClass('d-none');
                }, 2000);
                return;
                // TODAY
            } else if (isToday(selectedDate)) {
                $('#errorAlert').removeClass('d-none');
                $("#response").text("Please select a future date. Today is not allowed.");
                $(this).val('');
                setTimeout(function() {
                    $('#errorAlert').addClass('d-none');
                }, 2000);
                return;
                // SUNDAY
            } else if (isSunday(selectedDate)) {
                $('#errorAlert').removeClass('d-none');
                $("#response").text("Sundays are not available.");
                $(this).val('');
                setTimeout(function() {
                    $('#errorAlert').addClass('d-none');
                }, 2000);
                return;

            } else {
                $("#response").addClass("d-none");
            }
        });
    });
</script>


<?php include PATH . 'client/partials/footer.php' ?>