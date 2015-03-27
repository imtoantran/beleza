<div id="header-2" class="clearfix">
	<!--	############### imtoantran - add revslider #######################	-->
	<!-- <div id="rev_slider_2" class="revslider tp-banner-container"></div> -->
	<!--	############### imtoantran - add revslider #######################	-->	
</div>

<div class="container">
	<div class="row">
		<div class="col-md-offset-2 col-md-8 account-manager">
			<div class="text-center text-black title-info-user">
				<i id="gear" class="fa fa-gear"></i> Preference
			</div>
			<div class="row">
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					<label class=""> Tag quan tâm:</label>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
					<input class="tag-data" name="tag-data" data-tags="true" data-placeholder="Dịch vụ quan tâm"/>
				</div>
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
					<button class="btn btn-xs btn-primary" data-action="save" data-controller="clientpreference/updateTag">Lưu</button>
				</div>
			</div>
		</div>
	</div>
</div>
<style>
	div.account-manager{
		border: 1px solid #e4e4e4;
		font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
		margin-bottom: 20px;
		
		padding:0!important;
		box-shadow: 0px 1px 3px 0px rgba(0, 0, 0, 0.1)!important;
		-moz-box-shadow: 0px 1px 3px 0px rgba(0, 0, 0, 0.1)!important;
		-webkit-box-shadow: 0px 1px 3px 0px rgba(0, 0, 0, 0.1)!important;
	}
	div.account-manager p{font-weight: bold;}
	.title-info-user{
		padding: 10px;
		font-size: 2em;
		background-color: #f1f1f1;
		border-bottom: 1px solid #e5e5e5;
	}
	div.account-manager .row{
		/*background-color: rgba(228, 228, 228, 0.12);*/
		margin: 15px 0px;
		padding-top: 8px;
	}
	i.fa-pencil, i.fa-save{
		cursor: pointer;
	}
	i.fa-pencil:hover, i.fa-save:hover{
		font-size: 18px;
		color: #000000;
	}
	input#client_name, input#client_phone{
		margin-top: -8px;
	}
</style>