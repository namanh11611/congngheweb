@extends('user.master')
@section('content')

<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Contact</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
    	<div class="row">
			<div class="col-md-6">
				<form class="form-horizontal" action="{!! url('lien-he') !!}" method="post">
				<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
					<fieldset>
						<div class="control-group">
							<label for="name" class="control-label">Name <span class="required"></span></label>
							<div class="controls">
								<input type="text" class="required" id="name" placeholder="Your name" name="name" size="40" />
							</div>
						</div>
						<div class="control-group">
							<label for="name" class="control-label">Email <span class="required"></span></label>
							<div class="controls">
								<input type="text" class="required" id="name" placeholder="Your Email" name="email" size="40" />
							</div>
						</div>
						<div class="control-group">
							<label for="message" class="control-label">Message</label>
							<div class="controls">
								<textarea class="required" rows="6" cols="40" id="messages" placeholder="Please type a message..." name="messages"></textarea>
							</div>
						</div>

						<div class="form-action">
							<input class="btn btn-blue" type="submit" value="Submit" id="submit_id" name="send">
							<input class="btn" type="reset" value="Reset">
						</div>
            		</fieldset>
        		</form>
			</div>

			<div class="col-md-6">
				<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
				<br>
				<p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</p>
			</div>
		</div>
	</div>
</div>

@endsection