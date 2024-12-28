<style>


@media only screen and (max-width: 991px) {
    .rs-about {
        padding-top:0 important;
    }
}

</style>

<div id="rs-about" class="" style="">
    <br> <br>
     <br>

{{--    style="background: url('/path-to-image/submit.jpeg') no-repeat center; background-size: cover;"--}}
    <div class="container">
        <div class="row justify-content-center align-items-center" style="min-height: 50vh;">




            <div class="col-md-6 text-center" style="width:100%; height: auto;">
                <!-- Illustration Section -->

                <h3 class="text-center mb-3 mt-3" style="font-size: medium; ">আপনার প্রোডাক্টটি অরিজিনাল কিনা চেক করুন !</h3>

                <p class="text-center mb-4" style="font-size: 14px; ">আপনার কাছে থাকা প্রোডাক্টের প্যাকেটে থাকা ডিজিটাল সিকিউরিটি কোডটি এখানে লিখুন।</p>


                <br>
                <form action="{{route('product.match')}}" method="POST" enctype="multipart/form-data" style="background: rgba(255, 255, 255, 0.8); padding: 20px; border-radius: 10px;">
                    @csrf
                    <div class="row align-items-center">
                        <div class="col-md-8 mb-3">
                            <input type="text" class="form-control" name="code"  placeholder="আপনার কোড লিখুন" style="border-radius: 5px;">
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-success w-100" style="border-radius: 5px; margin-bottom: 16px;" >Check</button>
                        </div>


                    </div>
                </form>





            </div>
        </div>
    </div>
</div>



<!-- Stylish Bootstrap Modal -->
<div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="resultModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="resultModalLabel">Product Status</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center" id="modalMessage">
                <!-- Message dynamically injected here -->
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>



{{--
<script>
    async function trackProduct(event) {
        event.preventDefault();

        const code = document.getElementById('pcode').value;

        if (code.trim().length === 0) {
            alert('Please enter a product code');
            return;
        }

        try {
            const response = await axios.get(`/track-product`, { params: { code } });

            const modalMessage = document.getElementById('modalMessage');


            if (response.data.status === 'success') {
                modalMessage.innerHTML = `
                    <p class="text-success">
                        <strong>${response.data.message}</strong>
                    </p>
                    <i class="bi bi-check-circle" style="font-size: 2rem; color: green;"></i>`;
            } else {
                modalMessage.innerHTML = `
                    <p class="text-warning">
                        Unexpected server response
                    </p>`;
            }

            const modal = new bootstrap.Modal(document.getElementById('resultModal'));
            modal.show();
        } catch (error) {
            const modalMessage = document.getElementById('modalMessage');

            if (error.response && error.response.status === 401) {
                modalMessage.innerHTML = `
                    <p class="text-danger">
                        <strong>Product is fake</strong>
                    </p>
                    <i class="bi bi-x-circle" style="font-size: 2rem; color: red;"></i>`;
            } else {
                modalMessage.innerHTML = `
                    <p class="text-danger">
                        An error occurred while checking the product.
                    </p>`;
            }

            const modal = new bootstrap.Modal(document.getElementById('resultModal'));
            modal.show();
        }
    }


</script>

 --}}
