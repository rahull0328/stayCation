<?php require '../../includes/config.php'; ?>
<?php
include('../assets/includes/sidebar.php');
include('../assets/includes/header.php');
?>

<div class="container-fluid">
    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">
                        All Clients
                    </h5>
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Sr No.</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Name</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Email</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Status</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">AadharCard</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="showingClientDetails">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Aadhar Info</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <img width="100%" height="100%" id="aadhar">        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    <?php
    include('../assets/includes/footer.php');
    ?>

    <script>
        $(init);

        function init() {
            displayAllClients();
        }

        function displayAllClients() {
            $.ajax({
                url: '../../api/displayAllClient.php',
                success: function(response) {
                    let clientDetails = ``;
                    for (let i = 0; i < response.length; i++) {
                        clientDetails += `
                        <tr>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">${i+1}</h6>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-1">${response[i].name}</h6>
                                <span class="fw-normal">${response[i].number}</span>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">${response[i].email}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal  ${response[i].status == 'Approved' ? 'text-success' : 'text-danger'}">${response[i].status}</p>
                            </td>
                            <td class="border-bottom-0">
                                <div class="d-flex align-items-center gap-2">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="viewAadhar(${response[i].id})">
                                    View Aadhar
                                </button>                                    
                                </div>
                            </td>
                        </tr>
                        `
                    }

                    $('#showingClientDetails').html(clientDetails);
                }
            })
        }

        function viewAadhar(id) {
            let clientId = id;

            $.ajax({
                url: '../../api/viewAadhar.php?id='+clientId,
                method: "POST",
                data: {
                    id: clientId
                },
                success: function(response) {
                    console.log(response);
                    $("#aadhar").attr("src", `../../uploads/adhar/${response.aadharcard}`)
                }
            })
        }

    </script>