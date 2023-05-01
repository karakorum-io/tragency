<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('admin/include/head'); ?>
    <style>
        .font-xl {
            font-size: 40px;
        }
    </style>
</head>

<body class="text-left">
    <div class="app-admin-wrap layout-sidebar-large">

        <?php $this->load->view('admin/include/header'); ?>
        <?php $this->load->view('admin/include/sidebar'); ?>

        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="main-content">
                <?php $this->load->view('admin/include/message-alert'); ?>
                <div class="row mb-4">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-header">
                                <h3>Captured Leads</h3>
                            </div>
                            <div class="card-body">
                                <canvas id="leads"></canvas>
                            </div>
                            <div class="card-footer">
                                Number of customers registred on the site
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-header">
                                <h3>Bookings</h3>
                            </div>
                            <div class="card-body">
                                <canvas id="bookings"></canvas>
                            </div>
                            <div class="card-footer">
                                Bookings done in the last working week
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-header">
                                <h3>Accquired Customers</h3>
                            </div>
                            <div class="card-body">
                                <canvas id="customers"></canvas>
                            </div>
                            <div class="card-footer">
                                Number of customers registred on the site
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-2 mb-3">
                        <a href="<?php echo base_url() ?>admin/enquiries">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h3>Enquiries</h3>
                                </div>
                                <div class="card-body text-center">
                                    <h1 class="font-xl">
                                        <?php echo $enquiries ?>
                                    </h1>
                                </div>
                                <div class="card-footer text-center">
                                    Un-answered enquiries.
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2 mb-3">
                        <a href="<?php echo base_url() ?>admin/blogs">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h3>Posts</h3>
                                </div>
                                <div class="card-body text-center">
                                    <h1 class="font-xl">
                                        <?php echo $posts ?>
                                    </h1>
                                </div>
                                <div class="card-footer text-center">
                                    All un-published posts.
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2 mb-3">
                        <a href="<?php echo base_url() ?>admin/experiences">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h3>Experiences</h3>
                                </div>
                                <div class="card-body text-center">
                                    <h1 class="font-xl">
                                        <?php echo $experiences ?>
                                    </h1>
                                </div>
                                <div class="card-footer text-center">
                                    Un-approved experiences
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2 mb-3">
                        <a href="<?php echo base_url() ?>admin/destinations">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h3>Destinations</h3>
                                </div>
                                <div class="card-body text-center">
                                    <h1 class="font-xl">
                                        <?php echo $destinations ?>
                                    </h1>
                                </div>
                                <div class="card-footer text-center">
                                    New inactive destinations
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2 mb-3">
                        <a href="<?php echo base_url() ?>admin/packages">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h3>Packages</h3>
                                </div>
                                <div class="card-body text-center">
                                    <h1 class="font-xl">
                                        <?php echo $packages ?>
                                    </h1>
                                </div>
                                <div class="card-footer text-center">
                                    New inactive packages
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2 mb-3">
                        <a href="<?php echo base_url() ?>admin/leads">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h3>Leads</h3>
                                </div>
                                <div class="card-body text-center">
                                    <h1 class="font-xl">
                                        <?php echo $leads ?>
                                    </h1>
                                </div>
                                <div class="card-footer text-center">
                                    Number of leads captured
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex-grow-1"></div>
        </div>
    </div>

    <?php $this->load->view('admin/include/footerscript'); ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const weekdays = ['Mon', 'Tue', 'Wed', 'Thurs', 'Fri', 'Sat', 'Sun'];
        const bookings = document.getElementById('bookings');
        new Chart(bookings, {
            type: 'bar',
            data: {
                labels: weekdays,
                datasets: [{
                    backgroundColor: "#b78537",
                    label: 'Previous Week Bookings',
                    data: [12, 19, 3, 5, 2, 3, 3],
                    borderWidth: 0
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    }
                }
            }
        });

        const customers = document.getElementById('customers');
        new Chart(customers, {
            type: 'line',
            data: {
                labels: weekdays,
                datasets: [{
                    label: 'Accquired customers',
                    data: [65, 59, 80, 81, 56, 55, 40],
                    fill: false,
                    backgroundColor: "#b78537",
                    borderColor: "#b78537",
                    tension: 0.1
                }]
            }
        });

        const leads = document.getElementById('leads');
        new Chart(leads, {
            type: 'line',
            data: {
                labels: weekdays,
                datasets: [{
                    label: 'Accquired Leads',
                    data: [200, 59, 10, 2, 150, 150, 40],
                    fill: false,
                    backgroundColor: "#b78537",
                    borderColor: "#b78537",
                    tension: 0.1
                }]
            }
        });
    </script>
</body>

</html>