<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('admin/include/head'); ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
</head>

<body class="text-left">
    <div class="app-admin-wrap layout-sidebar-large">
        <?php $this->load->view('admin/include/header'); ?>
        <?php $this->load->view('admin/include/sidebar'); ?>
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="main-content">
                <div class="row mb-4">
                    <div class="col-md-12 mb-3">
                        <div class="card text-left">
                            <div class="card-header">
                                <h3 class="mr-2">Sales</h3>
                            </div>
                            <div class="card-body">
                                <?php $this->load->view('admin/include/message-alert'); ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th># ID</th>
                                                <th>Tour</th>
                                                <th>Details</th>
                                                <th>Customer</th>
                                                <th>Address</th>
                                                <th>Status</th>
                                                <th>Payments</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (count($bookings) > 0) {
                                                foreach ($bookings as $booking) {
                                                    ?>
                                                    <tr>
                                                        <td class="text-center">
                                                            <input type="checkbox" name="booking_id[]" value="<?php echo $booking->id ?>">
                                                            #<?php echo sprintf('%04d', $booking->id); ?>
                                                        </td>
                                                     <td>
                                                            <p><b>Tour :</b> <?php echo $booking->package_name ?><br><b>Option :</b> <?php echo $booking->option_name ?></p></td>
                                                        <td>
                                                            <p><b>Booked On:</b> <?php echo date('d-m-Y', strtotime($booking->created_at)) ?>
                                                            <small>
                                                                <?php echo $booking->created_at ? date('h:i A',strtotime($booking->created_at)) : ""; ?>
                                                            </small>
                                                            <br><b>Travel On :</b> <?php echo date('d-m-Y', strtotime($booking->travel_date)) ?>
                                                            <small>
                                                                <?php echo date('h:i A', strtotime($booking->travel_time)) ?>
                                                            </small><br />
                                                            <b>Packs:</b> 
                                                            <?php echo $booking->adult ?> Adult,
                                                            <?php echo $booking->child ?> Child,
                                                            <?php echo $booking->infant ?> Infant
                                                            </p>
                                                        </td>
                                                        <td><p><b>Name:</b> <?php echo $booking->name; ?><br>
                                                        <b>Phone:</b> <?php echo $booking->phone; ?><br>
                                                        <b>Email:</b> <?php echo $booking->email; ?><br></p>
                                                          </td>
                                                        <td>
                                                            <?php echo $booking->address ? $booking->address : "" ?><br>
                                                            <?php echo $booking->state ? getStateName($this->db,$booking->state) : ""; ?><br>
                                                          
                                                            <?php echo $booking->country ? getCountryName($this->db,$booking->country) : "" ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <p class="badge badge-success">
                                                                <?php echo Booking::STATUS[$booking->status]; ?>
                                                            </p>
                                                        </td>
                                                        <td class="text-right">
                                                            <p class="badge badge-danger">
                                                                <?php echo ucwords(str_replace('_', ' ', $booking->payment_type)); ?>
                                                            </p>
                                                            
                                                            <br />
                                                            <p><b>Cost:</b> <?php echo $booking->currency . " " . $booking->total ?><br>
                                                        <b>Paid:</b> <?php echo $booking->currency . " " . $booking->amount_paid ?><br>
                                                        <b>Paid on:</b> <?php echo $booking->paid_on ? date('d-m-Y',strtotime($booking->paid_on)) : ""; ?>
                                                            
                                                            <small>
                                                                <?php echo $booking->paid_on ? date('h:i A',strtotime($booking->paid_on)) : ""; ?>
                                                            </small></p>
                                                          
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <tr>
                                                    <td colspan="7">No Record Found</td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="pagination">
                                    <?php echo $this->pagination->create_links(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-grow-1"></div>
        </div>
    </div>
    <?php $this->load->view('admin/include/footerscript'); ?>
</body>

</html>