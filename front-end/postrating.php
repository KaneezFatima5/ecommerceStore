


<style>.rating_div {

    width: 350px;

    z-index: 7;
    border-radius: 10px;
    /* background-color: #b3cab5; */
    height: 184px;
    color: white;
    /* border: 1px solid white; */
    border: 1px solid #cad4ca;
    left: 26%;
    
    right: 40%;
    margin-left: auto;
    padding: 15px;
    margin-right: auto;      
    background: var(--theme-color2);
}
 .rating_div h3 {
    font-size: calc(16px + (20 - 16) * ((100vw - 320px) / (1920 - 320)));
    font-weight: 500;
    line-height: 1.2;
    font-size: 23px;
    text-align: center;
    margin: 12px;
    font-weight: 600;
}
svg#str {
    font-size: 30px;
    width: 35px;
    height: 45px;
}
.rating {
    display: -webkit-box;
    display: -ms-flexbox;
    margin-left: auto;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    margin-right: auto;
    margin-top: 14px;
}
.deal-modal .modal-dialog .modal-content .modal-body .deal-offer-box {
    height: 280px;
    overflow: auto;
}
</style>
<div class="modal fade theme-modal deal-modal" id="deal-box" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title w-100" id="deal_today"><?php echo @$rows["ProductName"]?></h5>
                        <p class="mt-1 text-content">Best deals for you.</p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="deal-offer-box">
                    <div class="rating_div">

<h3>Rate : <?php echo @$rows["ProductName"]?> </h3>

  <ul class="rating">
    
      
      <ul class="rating"> <?php
                          $product_review = 6;
                          $star = "<li><a href='#'><i data-feather='star' aria-hidden='true'></i></a></li>";
                          $total_stars = (int)($product_review / 2);

                          for ($i = 1; $i < $product_review; $i++) {
                              if ($i === 6) {
                                  break;
                              } else {
                                      $productids=@$rows["ProductID"];
                                  echo "<li ><a href='Product_Detail.php?strrr=$i&productid=$productids'   > 
                   <input type='text' data-feather='star'  class='p$i'id='str' >
      </a></li> ";
                              }
                          }
                          ?>
      </ul>
  </ul>

</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


        <script>

            $(document).ready(function() {


                $(function() {
                    $(".p2").hover(
                        function() {
                            $(".p2 ").toggleClass('fill btn-defaulthovered');
                            $(".p0 ").toggleClass('fill btn-defaulthovered');
                            $(".p1 ").toggleClass('fill btn-defaulthovered');

                        },

                        function() {
                            $(".p2 ").toggleClass('fill btn-defaulthovered');
                            $(".p0 ").toggleClass('fill btn-defaulthovered');
                            $(".p1 ").toggleClass('fill btn-defaulthovered');
                        });
                });
                $(function() {
                    $(".p0").hover(
                        function() {
                            $(".p0").toggleClass('fill btn-defaulthovered');;
                        },
                        function() {

                            $(".p0").toggleClass('fill btn-defaulthovered')
                        });
                });
                $(function() {
                    $(".p1").hover(
                        function() {

                            $(".p1").toggleClass('fill btn-defaulthovered');
                            $(".p0").toggleClass('fill btn-defaulthovered');
                        },
                        function() {
                            $(".p0").toggleClass('fill btn-defaulthovered');
                            $(".p1").toggleClass('fill btn-defaulthovered');
                        });
                });

                $(function() {
                    $(".p3").hover(
                        function() {
                            $(".p2 ").toggleClass('fill btn-defaulthovered');
                            $(".p0 ").toggleClass('fill btn-defaulthovered');
                            $(".p1 ").toggleClass('fill btn-defaulthovered');
                            $(".p3 ").toggleClass('fill btn-defaulthovered');
                        },
                        function() {
                            $(".p2 ").toggleClass('fill btn-defaulthovered');
                            $(".p0 ").toggleClass('fill btn-defaulthovered');
                            $(".p1 ").toggleClass('fill btn-defaulthovered');
                            $(".p3 ").toggleClass('fill btn-defaulthovered');

                        });
                });



                $(function() {
                    $(".p4").hover(
                        function() {
                            $(".p2 ").toggleClass('fill btn-defaulthovered');
                            $(".p0 ").toggleClass('fill btn-defaulthovered');
                            $(".p1 ").toggleClass('fill btn-defaulthovered');
                            $(".p3 ").toggleClass('fill btn-defaulthovered');
                            $(".p4 ").toggleClass('fill btn-defaulthovered');

                        },
                        function() {
                            $(".p2 ").toggleClass('fill btn-defaulthovered');
                            $(".p0 ").toggleClass('fill btn-defaulthovered');
                            $(".p1 ").toggleClass('fill btn-defaulthovered');
                            $(".p3 ").toggleClass('fill btn-defaulthovered');
                            $(".p4 ").toggleClass('fill btn-defaulthovered');
                        });
                });
                $(function() {
                    $(".p5").hover(
                        function() {
                            $(".p2 ").toggleClass('fill btn-defaulthovered');
                            $(".p0 ").toggleClass('fill btn-defaulthovered');
                            $(".p1 ").toggleClass('fill btn-defaulthovered');
                            $(".p3 ").toggleClass('fill btn-defaulthovered');
                            $(".p5 ").toggleClass('fill btn-defaulthovered');
                            $(".p4 ").toggleClass('fill btn-defaulthovered');

                        },
                        function() {
                            $(".p2 ").toggleClass('fill btn-defaulthovered');
                            $(".p0 ").toggleClass('fill btn-defaulthovered');
                            $(".p1 ").toggleClass('fill btn-defaulthovered');
                            $(".p4 ").toggleClass('fill btn-defaulthovered');
                            $(".p3 ").toggleClass('fill btn-defaulthovered');
                            $(".p5 ").toggleClass('fill btn-defaulthovered');
                        });
                });

            })
        </script>

<script src="../assets/js/jquery-3.6.0.min.js"></script>

<!-- jquery ui-->
<script src="../assets/js/jquery-ui.min.js"></script>

<!-- Bootstrap js-->
<script src="../assets/js/bootstrap/bootstrap.bundle.min.js"></script>
<script src="../assets/js/bootstrap/bootstrap-notify.min.js"></script>
<script src="../assets/js/bootstrap/popper.min.js"></script>

<!-- feather icon js-->
<script src="../assets/js/feather/feather.min.js"></script>
<script src="../assets/js/feather/feather-icon.js"></script>

<!-- Lazyload Js -->
<script src="../assets/js/lazysizes.min.js"></script>

<!-- Slick js-->
<script src="../assets/js/slick/slick.js"></script>
<script src="../assets/js/slick/slick-animation.min.js"></script>
<script src="../assets/js/slick/custom_slick.js"></script>

<!-- Auto Height Js -->
<script src="../assets/js/auto-height.js"></script>

<!-- Timer Js -->
<script src="../assets/js/timer1.js"></script>

<!-- Fly Cart Js -->
<script src="../assets/js/fly-cart.js"></script>

<!-- Quantity js -->
<script src="../assets/js/quantity-2.js"></script>

<!-- WOW js -->
<script src="../assets/js/wow.min.js"></script>
<script src="../assets/js/custom-wow.js"></script>

<!-- script js -->
<script src="../assets/js/script.js"></script>

<!-- thme setting js -->
<script src="../assets/js/theme-setting.js"></script>
<script src="../assets/js/jquery-3.6.0.min.js"></script>

<!-- jquery ui-->
<script src="../assets/js/jquery-ui.min.js"></script>

<!-- Bootstrap js-->
<script src="../assets/js/bootstrap/bootstrap.bundle.min.js"></script>
<script src="../assets/js/bootstrap/bootstrap-notify.min.js"></script>
<script src="../assets/js/bootstrap/popper.min.js"></script>

<!-- feather icon js-->
<script src="../assets/js/feather/feather.min.js"></script>
<script src="../assets/js/feather/feather-icon.js"></script>

<!-- Lazyload Js -->
<script src="../assets/js/lazysizes.min.js"></script>

<!-- Slick js-->
<script src="../assets/js/slick/slick.js"></script>
<script src="../assets/js/slick/slick-animation.min.js"></script>
<script src="../assets/js/slick/custom_slick.js"></script>

<!-- Price Range Js -->
<script src="../assets/js/ion.rangeSlider.min.js"></script>

<!-- Quantity js -->
<script src="../assets/js/quantity-2.js"></script>

<!-- sidebar open js -->
<script src="../assets/js/filter-sidebar.js"></script>

<!-- WOW js -->
<script src="../assets/js/wow.min.js"></script>
<script src="../assets/js/custom-wow.js"></script>

<!-- script js -->
<script src="../assets/js/script.js"></script>

<!-- thme setting js -->
<script src="../assets/js/theme-setting.js"></script>