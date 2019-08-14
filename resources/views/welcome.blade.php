@extends('layouts.master')

@section('title', '')

@section('content')
    <div class="container" style="padding-top: 40px;">
        <div class="row justify-content-center align-items-center">
            {{-- Make an shipment order --}}
            <div class="col-md-10 border border-default rounded p-2 mb-2">
                <div class="row">
                    <div class="col-md-6 content border-right">
                        {{-- <div class="col-12 mx-auto text-center" style="padding-left: 240px"> --}}
                        <div class="col-12 mx-auto text-center">
                          <img src="{{ Voyager::image( setting('site.logo') ) }}" style="width: 30%;">
                        </div>

                        <h1 class="text-center">{{ setting('site.title') }}</h1>

                        <p class="text-center">{{ setting('site.description') }}</p>
                    </div>
                    <div class="col-md-6 content my-auto">
                      <div class="card-title">
                        <div class="row justify-content-center align-items-center">
                          <div class="col-10 border-bottom">
                            <h4>Shipping Cost Calculator</h4>
                          </div>
                          <div class="col-2">
                            <div id="red-circle" class="circle-text float-right">
                              <div id="pricing-plan-price" class="pricing-plan-price inner-text center-align">
                                <sup><strong>$</strong></sup>0<span>.00</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <form>
                        <div class="form-group">
                          <label for="classification">Parcel Type</label>
                          <select id="classification" class="form-control form-control-sm" name="classification">
                            <option value="0" selected>Choose...</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="weight">Weight (lbs)</label>
                          <input type="text" class="form-control form-control-sm" id="weight" placeholder="Enter weight">
                        </div>
                        <div class="form-group">
                          <label for="dimentions">Dimensions: Length x Width x Height (cm)</label>
                          <div class="form-row align-items-center">
                            <div class="col-sm-4 my-1">
                              <label class="sr-only" for="length">Length</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text form-control-sm">L</div>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="length" placeholder="Length">
                              </div>
                            </div>
                            <div class="col-sm-4 my-1">
                              <label class="sr-only" for="width">Width</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text form-control-sm">W</div>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="width" placeholder="Width">
                              </div>
                            </div>
                            <div class="col-sm-4 my-1">
                              <label class="sr-only" for="height">Height</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text form-control-sm">H</div>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="height" placeholder="Height">
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                </div>
            </div>

            {{-- Track Shipment --}}
            <div class="col-md-10 border border-default rounded p-2 mt-2">
              <div class="border-bottom">
                <h4>Track Shipping</h4>
              </div>
              <form>
                <div class="form-group">
                  <label for="number"></label>
                  <input class="form-control form-control-sm" type="text" placeholder="Shipping No. Ej:(AWB-00-00000)">
                </div>
              </form>
            </div>
        </div>
    </div>
@endsection