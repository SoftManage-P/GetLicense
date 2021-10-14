		<div class="popup popup_wide popup_protect">
			<div class="popup__container container">
				<div class="row">
					<div class="popup__wrapper col col-md-7 col-sm-9">
						<div class="popup__head clearfix">
							<div class="row">
								<div class="popup__title col-sm-6 col-xs-8" id="title">Book Driving Lesson 	
							</div>
								<div class="popup__close col-sm-6 col-xs-4"><div class="popup__close__button"></div></div>
							</div>
						</div>
						<div class="popup__body">
							<div class="popup_protect__top row">
								<div class="popup_protect__img col col-lg-4 col-md-5"><div><img src="assets/images/course/driving-lesson.jpg" alt="Fast Track Driving lessons"></div></div>
								<div class="popup_protect__data col-lg-8 col-md-7" id="fetchInformation">
								</div>
								
							</div>
							
							<div class="row" id="bookingForm">
							
								<div class="col-sm-6">								
								<div class="form__row row" id="selectCourse">
										<div class="col-md-12">
											<select id="coursePopup" class="" data-placeholder="Select course">
												<option value="">Select Lesson</option>
												<option value="1">5 Hours</option>
												<option value="2">10 Hours</option>
												<option value="3">15 Hours</option>
												<option value="4">20 Hours</option>
												<option value="5">25 Hours</option>
												<option value="6">30 Hours</option>
												<option value="7">35 Hours</option>
												<option value="8">40 Hours</option>
												<option value="9">48 Hours</option>
												<option value="10">Course Assessment</option>
											</select>
										</div>
									</div>
									
									
									<div class="form__row row">
										<div class="col-md-12">
											<div class="control-group control-group_fullwidth">
												<span class="control-remark control-group__item">
													<svg class="control-remark__icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="assets/images/icon.svg#icon_users"></use></svg>
												</span>
												<span class="inp">
													<span class="inp__box">
														<input class="inp__control" type="text" id="name" name="name" placeholder="Enter your name">
													</span>
												</span>
											</div>
										</div>
									</div>
									<div class="form__row row">
										<div class="col-md-12">
											<div class="control-group control-group_fullwidth">
												<span class="control-remark control-group__item">
													<svg class="control-remark__icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="assets/images/icon.svg#icon_mail"></use></svg>
												</span>
												<span class="inp">
													<span class="inp__box">
														<input class="inp__control" type="email" id="email" name="email" placeholder="Enter your E-Mail">
													</span>
												</span>
											</div>
										</div>
									</div>
									<div class="form__row row">
										<div class="col-md-12">
											<div class="control-group control-group_fullwidth">
												<span class="control-remark control-group__item">
													<svg class="control-remark__icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="assets/images/icon.svg#icon_phone"></use></svg>
												</span>
												<span class="inp">
													<span class="inp__box">
														<input class="inp__control" type="tel" id="phone" name="phone" placeholder="Enter your Phone">
													</span>
												</span>
											</div>
										</div>
									</div>									
									<div class="form__row row">
										<div class="col-md-12">
											<div class="control-group control-group_fullwidth">
												<span class="control-remark control-group__item">
													<svg class="control-remark__icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="assets/images/icon.svg#icon_search"></use></svg>
												</span>
												<span class="inp">
													<span class="inp__box">
														<input class="inp__control" type="text" id="postal" name="postal" placeholder="Enter your Postal Code">
													</span>
												</span>
											</div>
										</div>
									</div>
									
									<div class="form__row row">
							<div class="col-xs-12">
								<div class="control-group control-group_fullwidth">
									<span class="control-remark control-group__item">
										<svg class="control-remark__icon"><use xlink:href="assets/images/icon.svg#icon_calendar"></use></svg>
									</span>
									<span class="inp">
										<span class="inp__box">
										<input class="inp__control" type="text" id="expectedDate" name="date" placeholder="Expected Date yyyy-mm-dd" />
										</span>
									</span>
								</div>
							</div>
							
						</div>
						
								</div>
								
							
							
							
							
						
						
								<div class="popup_protect__radios col-sm-6">
								<strong>Select Transmission</strong>
									<div class="popup_protect__radio radio">
										<input type="radio" name="transmission"  value="automatic" id="radio-1">
										<label for="radio-1" class="radio__label"></label>
										<p class="radio__text" style="margin-right:15px;">Automatic</p>
									
										<input type="radio" checked name="transmission" value="manual" id="radio-2">
										<label for="radio-2" class="radio__label"></label>
										<p class="radio__text">Manaul</p>
									</div>
								</div>
								
								
								<div class="popup_protect__radios col-sm-6">
								<strong>Select Test</strong>
									<div class="popup_protect__radio radio">
										<input type="checkbox" name="test"  value="practical" id="radio-3">
										<label for="radio-3" class="radio__label"></label>
										<p class="radio__text" style="margin-right:15px;">Practical</p>
									
										<input type="checkbox" name="test2" value="theory" id="radio-4">
										<label for="radio-4" class="radio__label"></label>
										<p class="radio__text">Theory</p>
									</div>
									<br>
									<div id="theoryTestFee" style="font-size:13px; margin-bottom:10px;">Theory Test Fee: &pound; 30</div>
									<br><div id="practicalTestFee" style="font-size:13px; margin-bottom:10px;">Practical Test Fee: &pound; 90</div>
									
								</div>
								
								
							
									<br>
							</div>
							
							<div class="form__row row" id="bookingButton">
								<div class="col-md-12">
									<button class="btn btn_fullwidth" type="button" id="nextInner">
										<span class="btn__text">Book Now</span>
									</button>
								</div>
							</div>
							
							
							<div id="payment" style="display:block;">
							         <!-- <h1 id="bookingNumberResult" style="text-align:center; color:red;">  </h1><br>     -->
									<div class="popup__head clearfix">
									<div class="row" id="normalCourse" style="display:none;">
										<div class="popup__title col-sm-12 col-xs-12" id="title5" style="font-size:20px; text-align:center;line-height:30px;">Driving lessons booking has been received. <br>Please confirm your booking by <br>depositing only &pound;100. 	
									</div>										
									</div>
									<div class="row" id="assessmentCourse" style="display:none;">
										<div class="popup__title col-sm-12 col-xs-12" id="title6" style="font-size:20px; text-align:center;line-height:30px;">Driving lessons booking has been received. <br>Please confirm your booking by <br>depositing only &pound;35. 	
									</div>										
									</div>
									</div>
									<br><br>
									<div class="form__row row" id="paypal" style="display:block;">
										<div class="col-md-12">
											<!-- <span class="btn__text">    -->
											<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
											<input type="hidden" name="cmd" value="_s-xclick">
											<input type="hidden" name="hosted_button_id" value="SZL6T69QE9JBN">
											<input type="image" src="https://www.paypalobjects.com/en_GB/i/btn/btn_paynowCC_LG.gif" name="submit" alt="PayPal – The safer, easier way to pay online!">
											<img alt="pay now with Paypal" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
</form>
										

													
										</div>
									</div>									
									<div class="form__row row" id="bank">
										<div class="col-md-12">
											<button class="btn btn_fullwidth" type="button" id="bankButton">
												<span class="btn__text">Deposit Using Wire Transfer</span>
											</button>
										</div>
									</div>
									
									<p class="desc">Booking Details have also been sent to you via email.</p>
							</div>
							
							<p class="desc">100% Refundable</p>
						</div>
					</div>
				</div>
			</div>
			<div class="popup__bg"></div>
		</div>