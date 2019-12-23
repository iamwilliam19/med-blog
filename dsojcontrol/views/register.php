<!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Staff Registration </h2>
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">registration</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->

                    <!-- ============================================================== -->
                    <!-- registration box -->
                        <div class="adminRegBox">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block" id="validation">
                                    <h3 class="section-title">Register a staff</h3>
                                    
                                </div>
                                <div class="card">
                                    
                                    <div class="card-body">
                                        <form onsubmit="regStaff(event)">
                                        
                                            <div class="formError">jj</div>
                                            <label for="fname">First name</label>
                                            <input type="text" class="form-control " id="fname" placeholder="First name"  >
                                            <div class="invalid-feedback"></div>
                                             <br />
                                            <label for="lname">Last name</label>
                                            <input type="text" class="form-control " id="lname" placeholder="Last name"  >
                                            <div class="invalid-feedback"></div>

                                            <br />
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control " id="email" placeholder="Email"  >
                                            <div class="invalid-feedback"></div>

                                            <br />
                                            <label for="pwd">Pasword </label>
                                            <input type="text" class="form-control " id="pwd" placeholder="Password"  >
                                            <div class="invalid-feedback"></div>

                                            <br />
                                            <label for="pwd2">confirm password</label>
                                            <input type="text" class="form-control " id="pwd2" placeholder="confirm password"  >
                                            <div class="invalid-feedback"></div>

                                            <br />
                                            <button type="submit" class="adminSub">Register</button>
                                            <div class="adminRegistered">
                                                Staff registered
                                            </div>
                                        </form>
                                    </div>
    
                                </div>
                            </div>
                        </div>
                        </div>
                    <!--end registration box -->
                    <!-- ============================================================== -->
