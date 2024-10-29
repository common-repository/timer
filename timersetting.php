<div id="poststuff" class="metabox-holder has-right-sidebar" style="float:left; width:600px;">
		<div id="post-body">

			<div id="post-body-content" class="form-wrap">
<h1>Timer Setting</h1>
                <form name="post_form" method="post" action="" enctype="multipart/form-data">
<table><tr>
<td valign="bottom">
				<div id="titlediv">

					<div class="form-field">

					<label for="title"><?php _e('Year') ?></label>
                    <?php $y=date('Y');?>
					<select name="year" id="year" class="text_field">
                    	<?php for($i=$y;$i<=($y+5); $i++){?>
                        <option value="<?php echo $i;?>" <?php echo ($i==$year)?'selected=selected':'';?>><?php echo $i;?></option>
                        <?php } ?>
                    </select>
					
					</div>

				</div>
   </td>
   <td valign="bottom">             
                <div id="titlediv">

					<div class="form-field">

					<label for="title"><?php _e('Month') ?></label>
					<select name="month" id="month" class="text_field">
                    	<?php for($i=1;$i<=12; $i++){?>
                        <option value="<?php echo $i;?>" <?php echo ($i==$month)?'selected=selected':'';?>><?php echo $i;?></option>
                        <?php } ?>
                    </select>

					</div>

				</div>
</td>
<td valign="bottom">
                <div id="titlediv">

					<div class="form-field">

					<label for="title"><?php _e('Date') ?></label>

					<select name="date" id="date" class="text_field">
                    	<?php for($i=1;$i<=31; $i++){?>
                        <option value="<?php echo $i;?>" <?php echo ($i==$date)?'selected=selected':'';?>><?php echo $i;?></option>
                        <?php } ?>
                    </select>

					</div>

				</div>

      </td>
      </tr>
      <tr>
      	<td colspan="3"><textarea name="timer_msg" id="timer_msg" cols="30" rows="3"><?php echo $timer_msg;?></textarea></td>
      </tr>
      <tr>
      <td valign="bottom" colspan="3">         
                     
              <div id="titlediv">

					<div class="form-field">
                <input type="submit" name="submit" value="Save" class="button" />

                <input type="hidden" name="act" value="timer" />
                </div>

				</div>
</td>

</tr>
</table>
                </form>
</div></div></div>