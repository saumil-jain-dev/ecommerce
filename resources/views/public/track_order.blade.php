@extends('public.layout')
@section('title','My Account')
@section('content')
<style>
    #tracking{
   background: #fff
}
.tracking-detail {
  padding: 3rem 0;
}
#tracking {
  margin-bottom: 1rem;
}
[class*="tracking-status-"] p {
  margin: 0;
  font-size: 1.1rem;
  color: #fff;
  text-transform: uppercase;
  text-align: center;
}
[class*="tracking-status-"] {
  padding: 1.6rem 0;
}
.tracking-list {
  border: 1px solid #e5e5e5;
}
.tracking-item {
  border-left: 4px solid #00ba0d;
  position: relative;
  padding: 2rem 1.5rem 0.5rem 2.5rem;
  font-size: 0.9rem;
  margin-left: 3rem;
  min-height: 5rem;
}
.tracking-item:last-child {
  padding-bottom: 4rem;
}
.tracking-item .tracking-date {
  margin-bottom: 0.5rem;
}
.tracking-item .tracking-date span {
  color: #888;
  font-size: 85%;
  padding-left: 0.4rem;
}
.tracking-item .tracking-content {
  padding: 0.5rem 0.8rem;
  background-color: #f4f4f4;
  border-radius: 0.5rem;
}
.tracking-item .tracking-content span {
  display: block;
  color: #767676;
  font-size: 13px;
}
.tracking-item .tracking-icon {
  position: absolute;
  left: -0.7rem;
  width: 1.1rem;
  height: 1.1rem;
  text-align: center;
  border-radius: 50%;
  font-size: 1.1rem;
  background-color: #fff;
  color: #fff;
}

.tracking-item-pending {
  border-left: 4px solid #d6d6d6;
  position: relative;
  padding: 2rem 1.5rem 0.5rem 2.5rem;
  font-size: 0.9rem;
  margin-left: 3rem;
  min-height: 5rem;
}
.tracking-item-pending:last-child {
  padding-bottom: 4rem;
}
.tracking-item-pending .tracking-date {
  margin-bottom: 0.5rem;
}
.tracking-item-pending .tracking-date span {
  color: #888;
  font-size: 85%;
  padding-left: 0.4rem;
}
.tracking-item-pending .tracking-content {
  padding: 0.5rem 0.8rem;
  background-color: #f4f4f4;
  border-radius: 0.5rem;
}
.tracking-item-pending .tracking-content span {
  display: block;
  color: #767676;
  font-size: 13px;
}
.tracking-item-pending .tracking-icon {
  line-height: 2.6rem;
  position: absolute;
  left: -0.7rem;
  width: 1.1rem;
  height: 1.1rem;
  text-align: center;
  border-radius: 50%;
  font-size: 1.1rem;
  color: #d6d6d6;
}
.tracking-item-pending .tracking-content {
  font-weight: 600;
  font-size: 17px;
}

.tracking-item .tracking-icon.status-current {
  width: 1.9rem;
  height: 1.9rem;
  left: -1.1rem;
}
.tracking-item .tracking-icon.status-intransit {
  color: #00ba0d;
  font-size: 0.6rem;
}
.tracking-item .tracking-icon.status-current {
  color: #00ba0d;
  font-size: 0.6rem;
}
@media (min-width: 992px) {
  .tracking-item {
    margin-left: 10rem;
  }
  .tracking-item .tracking-date {
    position: absolute;
    left: -10rem;
    width: 7.5rem;
    text-align: right;
  }
  .tracking-item .tracking-date span {
    display: block;
  }
  .tracking-item .tracking-content {
    padding: 0;
    background-color: transparent;
  }

  .tracking-item-pending {
    margin-left: 10rem;
  }
  .tracking-item-pending .tracking-date {
    position: absolute;
    left: -10rem;
    width: 7.5rem;
    text-align: right;
  }
  .tracking-item-pending .tracking-date span {
    display: block;
  }
  .tracking-item-pending .tracking-content {
    padding: 0;
    background-color: transparent;
  }
}

.tracking-item .tracking-content {
  font-weight: 600;
  font-size: 17px;
}

.blinker {
  border: 7px solid #e9f8ea;
  animation: blink 1s;
  animation-iteration-count: infinite;
}
@keyframes blink { 50% { border-color:#fff ; }  }
  </style>
<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href='{{ url("/") }}' rel='nofollow'><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Pages <span></span> My Account
            </div>
        </div>
    </div>
 	<div class="container py-5">
  <div class="row">

    <div class="col-md-12 col-lg-12">
      <div id="tracking-pre"></div>
      <div id="tracking">
        <div class="tracking-list">
          <div class="tracking-item">
            <div class="tracking-icon status-intransit">
              <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
              </svg>
            </div>
            <div class="tracking-date"><img src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg" class="img-responsive" alt="order-placed" /></div>
            <div class="tracking-content">Order Placed<span>09 Aug 2025, 10:00am</span></div>
          </div>
          <div class="tracking-item">
            <div class="tracking-icon status-intransit">
              <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
              </svg>
            </div>
            <div class="tracking-date"><img src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg" class="img-responsive" alt="order-placed" /></div>
            <div class="tracking-content">Order Confirmed<span>09 Aug 2025, 10:30am</span></div>
          </div>
          <div class="tracking-item">
            <div class="tracking-icon status-intransit">
              <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
              </svg>
            </div>
            <div class="tracking-date"><img src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg" class="img-responsive" alt="order-placed" /></div>
            <div class="tracking-content">Packed the product<span>09 Aug 2025, 12:00pm</span></div>
          </div>
          
          <div class="tracking-item-pending">
            <div class="tracking-icon status-intransit">
              <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
              </svg>
            </div>
            <div class="tracking-date"><img src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg" class="img-responsive" alt="order-placed" /></div>
            <div class="tracking-content">Delivered<span>12 Aug 2025, 09:00pm</span></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</main>
@stop