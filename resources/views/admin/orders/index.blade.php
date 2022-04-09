<div class="container-fluid py-4">
    <div class="d-sm-flex justify-content-between">
        <div>
            <a href="javascript:;" class="btn btn-icon bg-gradient-primary">
                New order
            </a>
        </div>
        <div class="d-flex">
            <div class="dropdown d-inline">
                <a href="javascript:;" class="btn btn-outline-dark dropdown-toggle " data-bs-toggle="dropdown"
                   id="navbarDropdownMenuLink2">
                    Filters
                </a>
                <ul class="dropdown-menu dropdown-menu-lg-start px-2 py-3" aria-labelledby="navbarDropdownMenuLink2"
                    data-popper-placement="left-start">
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Status: Paid</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Status: Refunded</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Status: Canceled</a></li>
                    <li>
                        <hr class="horizontal dark my-2">
                    </li>
                    <li><a class="dropdown-item border-radius-md text-danger" href="javascript:;">Remove Filter</a></li>
                </ul>
            </div>
            <button class="btn btn-icon btn-outline-dark ms-2 export" data-type="csv" type="button"
                    control-id="ControlID-2">
                <i class="material-icons text-xs position-relative">archive</i>
                Export CSV
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Orders Table</h5>
                    <p class="text-sm mb-0">
                        View all the orders from the previous year.
                    </p>
                </div>
                <div class="table-responsive">
                    <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                        <div class="dataTable-top">
                            <div class="dataTable-dropdown"><label><select class="dataTable-selector"
                                                                           control-id="ControlID-3">
                                        <option value="5">5</option>
                                        <option value="10" selected="">10</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                        <option value="25">25</option>
                                    </select> entries per page</label></div>
                            <div class="dataTable-search"><input class="dataTable-input" placeholder="Search..."
                                                                 type="text" control-id="ControlID-4"></div>
                        </div>
                        <div class="dataTable-container">
                            <table class="table table-flush dataTable-table" id="datatable-search">
                                <thead class="thead-light">
                                <tr>
                                    <th data-sortable="" style="width: 17.0778%;"><a href="#" class="dataTable-sorter">Id</a>
                                    </th>
                                    <th data-sortable="" style="width: 15.9393%;"><a href="#" class="dataTable-sorter">Date</a>
                                    </th>
                                    <th data-sortable="" style="width: 15.4965%;"><a href="#" class="dataTable-sorter">Status</a>
                                    </th>
                                    <th data-sortable="" style="width: 19.2916%;"><a href="#" class="dataTable-sorter">Customer</a>
                                    </th>
                                    <th data-sortable="" style="width: 21.1891%;"><a href="#" class="dataTable-sorter">Product</a>
                                    </th>
                                    <th data-sortable="" style="width: 11.0057%;"><a href="#" class="dataTable-sorter">Revenue</a>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="customCheck1"
                                                       control-id="ControlID-5">
                                            </div>
                                            <p class="text-xs font-weight-normal ms-2 mb-0">#10421</p>
                                        </div>
                                    </td>
                                    <td class="font-weight-normal">
                                        <span class="my-2 text-xs">1 Nov, 10:20 AM</span>
                                    </td>
                                    <td class="text-xs font-weight-normal">
                                        <div class="d-flex align-items-center">
                                            <button
                                                class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"
                                                control-id="ControlID-6"><i class="material-icons text-sm"
                                                                            aria-hidden="true">done</i></button>
                                            <span>Paid</span>
                                        </div>
                                    </td>
                                    <td class="text-xs font-weight-normal">
                                        <div class="d-flex align-items-center">
                                            <img src="../../../assets/img/team-2.jpg" class="avatar avatar-xs me-2"
                                                 alt="user image">
                                            <span>Orlando Imieto</span>
                                        </div>
                                    </td>
                                    <td class="text-xs font-weight-normal">
                                        <span class="my-2 text-xs">Nike Sport V2</span>
                                    </td>
                                    <td class="text-xs font-weight-normal">
                                        <span class="my-2 text-xs">$140,20</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="form-check pt-0">
                                                <input class="form-check-input" type="checkbox" id="customCheck2"
                                                       control-id="ControlID-7">
                                            </div>
                                            <p class="text-xs font-weight-normal ms-2 mb-0">#10422</p>
                                        </div>
                                    </td>
                                    <td class="font-weight-normal">
                                        <span class="my-2 text-xs">1 Nov, 10:53 AM</span>
                                    </td>
                                    <td class="text-xs font-weight-normal">
                                        <div class="d-flex align-items-center">
                                            <button
                                                class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"
                                                control-id="ControlID-8"><i class="material-icons text-sm"
                                                                            aria-hidden="true">done</i></button>
                                            <span>Paid</span>
                                        </div>
                                    </td>
                                    <td class="text-xs font-weight-normal">
                                        <div class="d-flex align-items-center">
                                            <img src="../../../assets/img/team-1.jpg" class="avatar avatar-xs me-2"
                                                 alt="user image">
                                            <span>Alice Murinho</span>
                                        </div>
                                    </td>
                                    <td class="font-weight-normal">
                                        <span class="my-2 text-xs">Valvet T-shirt</span>
                                    </td>
                                    <td class="font-weight-normal">
                                        <span class="my-2 text-xs">$42,00</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="customCheck3"
                                                       control-id="ControlID-9">
                                            </div>
                                            <p class="text-xs font-weight-normal ms-2 mb-0">#10423</p>
                                        </div>
                                    </td>
                                    <td class="font-weight-normal">
                                        <span class="my-2 text-xs">1 Nov, 11:13 AM</span>
                                    </td>
                                    <td class="text-xs font-weight-normal">
                                        <div class="d-flex align-items-center">
                                            <button
                                                class="btn btn-icon-only btn-rounded btn-outline-dark mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"
                                                control-id="ControlID-10"><i class="material-icons text-sm"
                                                                             aria-hidden="true">refresh</i></button>
                                            <span>Refunded</span>
                                        </div>
                                    </td>
                                    <td class="text-xs font-weight-normal">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-xs me-2 bg-gradient-dark">
                                                <span>M</span>
                                            </div>
                                            <span>Michael Mirra</span>
                                        </div>
                                    </td>
                                    <td class="text-xs font-weight-normal">
<span class="my-2 text-xs">
Leather Wallet
<span class="text-secondary ms-2"> +1 more </span>
</span>
                                    </td>
                                    <td class="text-xs font-weight-normal">
                                        <span class="my-2 text-xs">$25,50</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="customCheck4"
                                                       control-id="ControlID-11">
                                            </div>
                                            <p class="text-xs font-weight-normal ms-2 mb-0">#10424</p>
                                        </div>
                                    </td>
                                    <td class="font-weight-normal">
                                        <span class="my-2 text-xs">1 Nov, 12:20 PM</span>
                                    </td>
                                    <td class="text-xs font-weight-normal">
                                        <div class="d-flex align-items-center">
                                            <button
                                                class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"
                                                control-id="ControlID-12"><i class="material-icons text-sm"
                                                                             aria-hidden="true">done</i></button>
                                            <span>Paid</span>
                                        </div>
                                    </td>
                                    <td class="text-xs font-weight-normal">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                <img src="../../../assets/img/team-3.jpg" class="avatar avatar-xs me-2"
                                                     alt="user image">
                                                <span>Andrew Nichel</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-xs font-weight-normal">
<span class="my-2 text-xs">
 Bracelet Onu-Lino
</span>
                                    </td>
                                    <td class="text-xs font-weight-normal">
                                        <span class="my-2 text-xs">$19,40</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="customCheck5"
                                                       control-id="ControlID-13">
                                            </div>
                                            <p class="text-xs font-weight-normal ms-2 mb-0">#10425</p>
                                        </div>
                                    </td>
                                    <td class="font-weight-normal">
                                        <span class="my-2 text-xs">1 Nov, 1:40 PM</span>
                                    </td>
                                    <td class="text-xs font-weight-normal">
                                        <div class="d-flex align-items-center">
                                            <button
                                                class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"
                                                control-id="ControlID-14"><i class="material-icons text-sm"
                                                                             aria-hidden="true">clear</i></button>
                                            <span>Canceled</span>
                                        </div>
                                    </td>
                                    <td class="text-xs font-weight-normal">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                <img src="../../../assets/img/team-4.jpg" class="avatar avatar-xs me-2"
                                                     alt="user image">
                                                <span>Sebastian Koga</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-xs font-weight-normal">
<span class="my-2 text-xs">
Phone Case Pink
<span class="text-secondary ms-2"> x 2 </span>
</span>
                                    </td>
                                    <td class="text-xs font-weight-normal">
                                        <span class="my-2 text-xs">$44,90</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="customCheck6"
                                                       control-id="ControlID-15">
                                            </div>
                                            <p class="text-xs font-weight-normal ms-2 mb-0">#10426</p>
                                        </div>
                                    </td>
                                    <td class="font-weight-normal">
                                        <span class="my-2 text-xs">1 Nov, 2:19 AM</span>
                                    </td>
                                    <td class="text-xs font-weight-normal">
                                        <div class="d-flex align-items-center">
                                            <button
                                                class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"
                                                control-id="ControlID-16"><i class="material-icons text-sm"
                                                                             aria-hidden="true">done</i></button>
                                            <span>Paid</span>
                                        </div>
                                    </td>
                                    <td class="text-xs font-weight-normal">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-xs me-2 bg-gradient-primary">
                                                <span>L</span>
                                            </div>
                                            <span>Laur Gilbert</span>
                                        </div>
                                    </td>
                                    <td class="text-xs font-weight-normal">
<span class="my-2 text-xs">
Backpack Niver
</span>
                                    </td>
                                    <td class="text-xs font-weight-normal">
                                        <span class="my-2 text-xs">$112,50</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="customCheck7"
                                                       control-id="ControlID-17">
                                            </div>
                                            <p class="text-xs font-weight-normal ms-2 mb-0">#10427</p>
                                        </div>
                                    </td>
                                    <td class="font-weight-normal">
                                        <span class="my-2 text-xs">1 Nov, 3:42 AM</span>
                                    </td>
                                    <td class="text-xs font-weight-normal">
                                        <div class="d-flex align-items-center">
                                            <button
                                                class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"
                                                control-id="ControlID-18"><i class="material-icons text-sm"
                                                                             aria-hidden="true">done</i></button>
                                            <span>Paid</span>
                                        </div>
                                    </td>
                                    <td class="text-xs font-weight-normal">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-xs me-2 bg-gradient-dark">
                                                <span>I</span>
                                            </div>
                                            <span>Iryna Innda</span>
                                        </div>
                                    </td>
                                    <td class="text-xs font-weight-normal">
<span class="my-2 text-xs">
Adidas Vio
</span>
                                    </td>
                                    <td class="text-xs font-weight-normal">
                                        <span class="my-2 text-xs">$200,00</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="customCheck8"
                                                       control-id="ControlID-19">
                                            </div>
                                            <p class="text-xs font-weight-normal ms-2 mb-0">#10428</p>
                                        </div>
                                    </td>
                                    <td class="font-weight-normal">
                                        <span class="my-2 text-xs">2 Nov, 9:32 AM</span>
                                    </td>
                                    <td class="text-xs font-weight-normal">
                                        <div class="d-flex align-items-center">
                                            <button
                                                class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"
                                                control-id="ControlID-20"><i class="material-icons text-sm"
                                                                             aria-hidden="true">done</i></button>
                                            <span>Paid</span>
                                        </div>
                                    </td>
                                    <td class="text-xs font-weight-normal">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-xs me-2 bg-gradient-dark">
                                                <span>A</span>
                                            </div>
                                            <span>Arrias Liunda</span>
                                        </div>
                                    </td>
                                    <td class="text-xs font-weight-normal">
<span class="my-2 text-xs">
Airpods 2 Gen
</span>
                                    </td>
                                    <td class="text-xs font-weight-normal">
                                        <span class="my-2 text-xs">$350,00</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="customCheck9"
                                                       control-id="ControlID-21">
                                            </div>
                                            <p class="text-xs font-weight-normal ms-2 mb-0">#10429</p>
                                        </div>
                                    </td>
                                    <td class="font-weight-normal">
                                        <span class="my-2 text-xs">2 Nov, 10:14 AM</span>
                                    </td>
                                    <td class="text-xs font-weight-normal">
                                        <div class="d-flex align-items-center">
                                            <button
                                                class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"
                                                control-id="ControlID-22"><i class="material-icons text-sm"
                                                                             aria-hidden="true">done</i></button>
                                            <span>Paid</span>
                                        </div>
                                    </td>
                                    <td class="text-xs font-weight-normal">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                <img src="../../../assets/img/team-5.jpg" class="avatar avatar-xs me-2"
                                                     alt="user image">
                                                <span>Rugna Ilpio</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-xs font-weight-normal">
<span class="my-2 text-xs">
Bracelet Warret
</span>
                                    </td>
                                    <td class="text-xs font-weight-normal">
                                        <span class="my-2 text-xs">$15,00</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="customCheck10"
                                                       control-id="ControlID-23">
                                            </div>
                                            <p class="text-xs font-weight-normal ms-2 mb-0">#10430</p>
                                        </div>
                                    </td>
                                    <td class="font-weight-normal">
                                        <span class="my-2 text-xs">2 Nov, 12:56 PM</span>
                                    </td>
                                    <td class="text-xs font-weight-normal">
                                        <div class="d-flex align-items-center">
                                            <button
                                                class="btn btn-icon-only btn-rounded btn-outline-dark mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"
                                                control-id="ControlID-24"><i class="material-icons text-sm"
                                                                             aria-hidden="true">refresh</i></button>
                                            <span>Refunded</span>
                                        </div>
                                    </td>
                                    <td class="text-xs font-weight-normal">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                <img src="../../../assets/img/ivana-squares.jpg"
                                                     class="avatar avatar-xs me-2" alt="user image">
                                                <span>Anna Landa</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-xs font-weight-normal">
<span class="my-2 text-xs">
Watter Bottle India
<span class="text-secondary ms-2"> x 3 </span>
</span>
                                    </td>
                                    <td class="text-xs font-weight-normal">
                                        <span class="my-2 text-xs">$25,00</span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="dataTable-bottom">
                            <div class="dataTable-info">Showing 1 to 10 of 12 entries</div>
                            <nav class="dataTable-pagination">
                                <ul class="dataTable-pagination-list">
                                    <li class="pager"><a href="#" data-page="1">‹</a></li>
                                    <li class="active"><a href="#" data-page="1">1</a></li>
                                    <li class=""><a href="#" data-page="2">2</a></li>
                                    <li class="pager"><a href="#" data-page="2">›</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer py-4  ">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="copyright text-center text-sm text-muted text-lg-start">
                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        2022,
                        made with <i class="fa fa-heart" aria-hidden="true"></i> by
                        <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                        for a better web.
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative
                                Tim</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                               target="_blank">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/blog" class="nav-link text-muted"
                               target="_blank">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                               target="_blank">License</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>
