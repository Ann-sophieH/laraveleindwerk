<div class=" py-4">
<!--            <div class="d-sm-flex ">
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
            </div>-->
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
<!--
                                    <div class="dataTable-dropdown"><label><select class="dataTable-selector"
                                                                                   control-id="ControlID-3">
                                                <option value="5">5</option>
                                                <option value="10" selected="">10</option>
                                                <option value="15">15</option>
                                                <option value="20">20</option>
                                                <option value="25">25</option>
                                            </select> entries per page</label></div>
-->
                                    <form class="ms-5 mt-5 input-group-outline">
                                        @csrf
                                        <input wire:model.debounce.200ms="search" type="text" name="searchLivewire" class="form-control  mb-3 border-1 small" onfocus="focused(this)" onfocusout="defocused(this)" control-id="ControlID-1"
                                               placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    </form>
                                </div>
                                <div class="dataTable-container">
                                    <table class="table table-flush dataTable-table" id="datatable-search">
                                        <thead class="thead-light">
                                        <tr>
                                            <th  ><a href="#" class="">Id</a>
                                            </th>
                                            <th class="d-flex">
                                                <i class="fa fa-sort me-3"></i>
                                                <button wire:click="sortBy('created_at')" class="btn p-0 shadow-none"><strong>Date</strong></button>
                                            </th>

                                            <th ><a href="#" class="">Status</a>
                                            </th>
                                            <th class="d-flex ">
                                                <i class="fa fa-sort me-3"></i>
                                                <button wire:click="sortBy('user_id')" class="btn p-0 shadow-none"><strong>Customer</strong></button>
                                            </th>
                                            <th  ><a href="#" class="">Details</a>
                                            </th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $order)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="customCheck1"
                                                               control-id="ControlID-5">
                                                    </div>
                                                    <p class="text-xs font-weight-normal ms-2 mb-0">#{{$order->id}}</p>
                                                </div>
                                            </td>
                                            <td class="font-weight-normal">
                                                <span class="my-2 text-xs">{{$order->created_at->diffForHumans()}}</span>
                                            </td>
                                            <td class="text-xs font-weight-normal">
                                                <div class="d-flex align-items-center">
                                                    @if($order->transaction_code != 0 )
                                                    <div class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"
                                                        ><i class="material-icons text-sm">done</i></div>
                                                    <span>Paid</span>
                                                        @else
                                                        <div class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"
                                                        ><i class="material-icons text-sm">clear</i></div>
                                                        <span>Not paid</span>
                                                        @endif
                                                </div>
                                            </td>
                                            <td class="text-xs font-weight-normal">
                                                <div class="d-flex align-items-center">
                                                    @if(($order->user->photos)->isNotEmpty())
                                                        @foreach($order->user->photos as $photo)

                                                            <img  class=" avatar avatar-xs me-2" src="{{ empty($photo) ? 'http://via.placeholder.com/62x62' : asset($photo->file) }}" alt="{{$order->user->username}}">
                                                        @endforeach
                                                    @else
                                                        <img  class=" avatar avatar-xs me-2" src="http://via.placeholder.com/62x62" alt="{{$order->user->username}}">

                                                    @endif

                                                    <span>{{$order->user->first_name}} {{$order->user->last_name}}</span>
                                                </div>
                                            </td>
                                            <td class="text-xs font-weight-normal">
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-outline-primary opacity-7" data-bs-toggle="modal" data-bs-target="#modal{{$order->id}}">
                                                   See orderdetails
                                                </button>
                                                <a href=""> <span class="my-2 text-xs"> </span></a>
                                            </td>

                                        </tr>

                                        <!-- Modal orderdetails -->
                                        <div class="modal fade" id="modal{{$order->id}}" tabindex="-1" aria-labelledby="modal{{$order->id}}Label" aria-hidden="true">
                                            <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content mx-2">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modal{{$order->id}}Label">Details for order: {{$order->transaction_code}}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="material-icons text-sm text-muted"
                                                                                                                                              aria-hidden="true">clear</i></button>


                                                    </div>
                                                    <div class="modal-body">

                                                        <ul class="list-group">
                                                            @foreach($order->orderdetails as $details )
                                                                <li class="list-group-item py-5">
                                                                    <div class="d-flex justify-content-between">
                                                                        @if(($details->product->photos)->isNotEmpty())
                                                                            @foreach($details->product->photos as $photo)

                                                                                <img  class=" avatar  me-2 @if(!$loop->first) d-none @endif" src="{{ empty($photo) ? 'http://via.placeholder.com/62x62' : asset($photo->file) }}" alt="{{$details->product->name}}">
                                                                            @endforeach
                                                                        @else
                                                                            <img  class=" avatar  me-2" src="http://via.placeholder.com/62x62" alt="{{$details->product->name}}">

                                                                        @endif

                                                                        <span class="fs-bo">{{$details->product->name}} </span>
                                                                            <span class="ms-2 text-xs ">&euro; {{$details->product_price}} </span>
                                                                            <span class="ms-2 text-primary fs-bo text-lg">x {{$details->amount}} </span>

                                                                            <span class="ms-2 fs-bo">&euro; {{$details->product_price * $details->amount}} </span>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <div class="modal-footer fs-li">

                                                            <span class="fs-bo">Delivery address:  </span>
                                                        @if($order->address())
                                                         <p>{{$order->address->name_recipient}}</p>
                                                            <p>{{$order->address->addressline_1}}</p>
                                                            <p>{{$order->address->addressline_2}}</p>
                                                       @endif

                                                        <div class=" py-3 text-xs mt-3 border-top mt-2">

                                                            <span class="fs-bo text-md ">Shipping time:  </span>

                                                            <p class="mt-3">order placed:  <span class="text-info">{{$order->created_at->format('l, d F, Y')}} </span></p>
                                                            <p> order to packaged and sent by <span class="text-danger">
                                                            {{$order->created_at->addWeekdays(5)->format('l, d F, Y')}}</span>
                                                            </p>  </div>


                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <div class=" col-3 mx-auto">
                                    {{$orders->render()}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

</div>
