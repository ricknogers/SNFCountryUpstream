<?php
/**
 * Email Body
 *
 * Heavily influenced by the great AffiliateWP plugin by Pippin Williamson.
 * https://github.com/AffiliateWP/AffiliateWP/tree/master/templates/emails
 *
 * @since 7.10.5
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$icon_stats           = plugins_url( "pro/assets/img/emails/summaries/stats.png", EXACTMETRICS_PLUGIN_FILE );
$icon_stats_2x        = plugins_url( "pro/assets/img/emails/summaries/stats@2x.png", EXACTMETRICS_PLUGIN_FILE );
$icon_users           = plugins_url( "pro/assets/img/emails/summaries/users.png", EXACTMETRICS_PLUGIN_FILE );
$icon_users_2x        = plugins_url( "pro/assets/img/emails/summaries/users@2x.png", EXACTMETRICS_PLUGIN_FILE );
$icon_views           = plugins_url( "pro/assets/img/emails/summaries/views.png", EXACTMETRICS_PLUGIN_FILE );
$icon_views_2x        = plugins_url( "pro/assets/img/emails/summaries/views@2x.png", EXACTMETRICS_PLUGIN_FILE );
$icon_increase        = plugins_url( "pro/assets/img/emails/summaries/increase.png", EXACTMETRICS_PLUGIN_FILE );
$icon_increase_2x     = plugins_url( "pro/assets/img/emails/summaries/increase@2x.png", EXACTMETRICS_PLUGIN_FILE );
$icon_decrease        = plugins_url( "pro/assets/img/emails/summaries/decrease.png", EXACTMETRICS_PLUGIN_FILE );
$icon_decrease_2x     = plugins_url( "pro/assets/img/emails/summaries/decrease@2x.png", EXACTMETRICS_PLUGIN_FILE );
$icon_pages           = plugins_url( "pro/assets/img/emails/summaries/pages.png", EXACTMETRICS_PLUGIN_FILE );
$icon_pages_2x        = plugins_url( "pro/assets/img/emails/summaries/pages@2x.png", EXACTMETRICS_PLUGIN_FILE );
$icon_referrals       = plugins_url( "pro/assets/img/emails/summaries/referrals.png", EXACTMETRICS_PLUGIN_FILE );
$icon_referrals_2x    = plugins_url( "pro/assets/img/emails/summaries/referrals@2x.png", EXACTMETRICS_PLUGIN_FILE );
$icon_announcement    = plugins_url( "pro/assets/img/emails/summaries/announcement.png", EXACTMETRICS_PLUGIN_FILE );
$icon_announcement_2x = plugins_url( "pro/assets/img/emails/summaries/announcement@2x.png", EXACTMETRICS_PLUGIN_FILE );

$site_url   = get_site_url();
$start_date = isset( $startDate ) ? $startDate : date( "Y-m-d", strtotime( "-1 day, last week" ) );
$start_date = date( "F j, Y", strtotime( $start_date ) );
$end_date   = isset( $endDate ) ? $endDate : date( "Y-m-d", strtotime( "last saturday" ) );
$end_date   = date( "F j, Y", strtotime( $end_date ) );

$total_visitors              = isset( $summaries['data']['infobox']['sessions']['value'] ) ? $summaries['data']['infobox']['sessions']['value'] : 0;
$prev_visitors_percentage    = isset( $summaries['data']['infobox']['sessions']['prev'] ) ? $summaries['data']['infobox']['sessions']['prev'] : 0;
$visitors_percentage_icon    = $icon_decrease;
$visitors_percentage_icon_2x = $icon_decrease_2x;
$visitors_percentage_class   = 'mcnTextDecrease';
$visitors_difference         = __( 'Decrease visitors: ', 'exactmetrics-premium' );
if ( (int)$prev_visitors_percentage === (int)$prev_visitors_percentage && (int)$prev_visitors_percentage >= 0 ) {
	$visitors_percentage_icon    = $icon_increase;
	$visitors_percentage_icon_2x = $icon_increase_2x;
	$visitors_percentage_class   = 'mcnTextIncrease';
	$visitors_difference         = __( 'Increase visitors: ', 'exactmetrics-premium' );
}

$total_pageviews              = isset( $summaries['data']['infobox']['pageviews']['value'] ) ? $summaries['data']['infobox']['pageviews']['value'] : 0;
$prev_pageviews_percentage    = isset( $summaries['data']['infobox']['pageviews']['prev'] ) ? $summaries['data']['infobox']['pageviews']['prev'] : 0;
$pageviews_percentage_icon    = $icon_decrease;
$pageviews_percentage_icon_2x = $icon_decrease_2x;
$pageviews_percentage_class   = 'mcnTextDecrease';
$pageviews_difference         = __( 'Decrease pageviews: ', 'exactmetrics-premium' );
if ( (int)$prev_pageviews_percentage === (int)$prev_pageviews_percentage && (int)$prev_pageviews_percentage >= 0 ) {
	$pageviews_percentage_icon    = $icon_increase;
	$pageviews_percentage_icon_2x = $icon_increase_2x;
	$pageviews_percentage_class   = 'mcnTextIncrease';
	$pageviews_difference         = __( 'Increase pageviews: ', 'exactmetrics-premium' );
}

$top_pages      = isset( $summaries['data']['toppages'] ) ? $summaries['data']['toppages'] : '';
$top_referrals  = isset( $summaries['data']['referrals'] ) ? $summaries['data']['referrals'] : '';
$more_pages     = isset( $summaries['data']['galinks']['topposts'] ) ? $summaries['data']['galinks']['topposts'] : '';
$more_referrals = isset( $summaries['data']['galinks']['referrals'] ) ? $summaries['data']['galinks']['referrals'] : '';

?>
<tr>
	<td valign="top" class="mcnTextBlockInner" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
		
		<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" class="mcnTextContentContainer">
			<tbody>
				<tr style="display:block;">
					<td style="padding-right: 40px;padding-left: 40px;font-weight: bold;font-size: 24px;line-height: 28px;color: #393F4C;" class="mcnTextContent"><?php echo $title; ?></td>
				</tr>
				<tr style="display:block;">
					<td style="padding-right: 40px;padding-left: 40px;padding-top:8px;font-weight: normal;font-size: 14px;line-height: 16px;color: #7F899F;" class="mcnTextContent"><?php echo $start_date; ?> - <?php echo $end_date; ?></td>
				</tr>
				<tr style="display:block;">
				  	<td style="padding-top:8px;padding-left: 40px;padding-right: 40px;font-weight: bold;font-size: 14px;line-height: 16px;color: #7F899F;text-align:left;" class="mcnTextContent">
				    	<?php 
					  		if( ! empty( $icon_stats ) ) {
					  			echo '<img style="margin-right:5px;margin-bottom: -2px;" src="' . esc_url( $icon_stats ) . '" srcset="' . esc_url( $icon_stats_2x ) . ' 2x" target="_blank" alt="' . __( 'Website: ', 'exactmetrics-premium' ) . '" />';
					  		}
					  	?>
						<a href="<?php echo $site_url; ?>" style="font-weight: bold;font-size: 14px;line-height: 16px;color: #7F899F;text-decoration: underline;"><?php echo $site_url; ?></a>
					</td>
				</tr>
				<tr style="display:block;padding: 30px 40px 0 40px;">
					<td style="font-weight: bold;font-size: 14px;line-height: 27px;color: #393F4C;" class="mcnTextContent"><?php _e( 'Hi there!', 'exactmetrics-premium' ); ?></td>
				</tr>
				<tr style="display:block;padding:0 40px;">
					<td style="font-weight: normal;font-size: 14px;line-height: 20px;color: #4F5769;" class="mcnTextContent"><?php echo $description; ?></td>
				</tr>                           
			</tbody>
		</table>

		<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" role="presentation">
			<tbody>
				<tr style="display:inline-block;width:82%;padding: 65px 9% 0 9%;">
					<td style="width:50%;float:left;text-align:center;">
						<?php 
					  		if( ! empty( $icon_users ) ) {
					  			echo '<img src="' . esc_url( $icon_users ) . '" srcset="' . esc_url( $icon_users_2x ) . ' 2x" target="_blank" alt="' . __( 'Visitors', 'exactmetrics-premium' ) . '" />';
					  		}
					  	?>
					</td>
					<td style="width:50%;float:left;text-align:center;">
						<?php 
					  		if( ! empty( $icon_views ) ) {
					  			echo '<img src="' . esc_url( $icon_views ) . '" srcset="' . esc_url( $icon_views_2x ) . ' 2x" target="_blank" alt="' . __( 'Pageviews', 'exactmetrics-premium' ) . '" />';
					  		}
					  	?>
					</td>
				</tr>
				<tr style="display:inline-block;width:82%;padding: 0 9%;">
					<td style="width:50%;float:left;padding-top:5px;text-align:center;font-weight: bold;font-size: 14px;line-height: 16px;color: #393F4C;" class="mcnTextContent"><?php _e( 'Total Visitors', 'exactmetrics-premium' ); ?></td>
					<td style="width:50%;float:left;padding-top:5px;text-align:center;font-weight: bold;font-size: 14px;line-height: 16px;color: #393F4C;" class="mcnTextContent"><?php _e( 'Total Pageviews', 'exactmetrics-premium' ); ?></td>
				</tr>
				<tr style="display:inline-block;width:82%;padding: 0 9%;">
					<td style="width:50%;float:left;padding-top:10px;text-align:center;font-weight: normal;font-size: 32px;line-height: 37px;color: #393F4C;" class="mcnTextContent"><?php echo number_format_i18n( $total_visitors ); ?></td>
					<td style="width:50%;float:left;padding-top:10px;text-align:center;font-weight: normal;font-size: 32px;line-height: 37px;color: #393F4C;" class="mcnTextContent"><?php echo number_format_i18n( $total_pageviews ); ?></td>
				</tr>
				<tr style="display:inline-block;width:82%;padding: 0 9%;">
					<td style="width:50%;float:left;padding-top:15px;text-align:center;line-height: 16px;" class="mcnTextContent <?php echo $visitors_percentage_class; ?>">
						<?php 
					  		if( ! empty( $visitors_percentage_icon ) ) {
					  			echo '<img src="' . esc_url( $visitors_percentage_icon ) . '" srcset="' . esc_url( $visitors_percentage_icon_2x ) . ' 2x" target="_blank" alt="' . $visitors_difference . '" />';
					  		}
					  	?>
					  	<?php echo $prev_visitors_percentage; ?>%
					</td>
					<td style="width:50%;float:left;padding-top:15px;text-align:center;line-height: 16px;" class="mcnTextContent <?php echo $pageviews_percentage_class; ?>">
						<?php 
					  		if( ! empty( $pageviews_percentage_icon ) ) {
					  			echo '<img src="' . esc_url( $pageviews_percentage_icon ) . '" srcset="' . esc_url( $pageviews_percentage_icon_2x ) . ' 2x" target="_blank" alt="' . $pageviews_difference . '" />';
					  		}
					  	?>
					  	<?php echo $prev_pageviews_percentage; ?>%
					</td>
				</tr>
				<tr style="display:inline-block;width:82%;padding: 0 9%;">
					<td style="width:50%;float:left;padding-top:5px;text-align:center;font-weight: normal;font-size: 12px;line-height: 14px;color: #9CA4B5;" class="mcnTextContent"><?php _e( 'vs previous 30 days', 'exactmetrics-premium' ); ?></td>
					<td style="width:50%;float:left;padding-top:5px;text-align:center;font-weight: normal;font-size: 12px;line-height: 14px;color: #9CA4B5;" class="mcnTextContent"><?php _e( 'vs previous 30 days', 'exactmetrics-premium' ); ?></td>
				</tr>
			</tbody>
		</table>


		<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" role="presentation">
			<tbody>
                <tr style="display:block;width:100%;">
                  <td style="width:100%;display:block;height: 50px;border-bottom:1px solid #F0F2F4;"></td>
                </tr>
            </tbody>
        </table>

        <?php if( ! empty( $top_pages ) )  : ?>
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" role="presentation">
				<tbody>
					<tr style="display:block;width:100%;padding: 40px 0 0 0;">
						<td style="display:block;width:100%;text-align:center;">
							<?php 
								if( ! empty( $icon_pages ) ) {
						  			echo '<img src="' . esc_url( $icon_pages ) . '" srcset="' . esc_url( $icon_pages_2x ) . ' 2x" target="_blank" alt="' . __( 'Pages', 'exactmetrics-premium' ) . '" />';
						  		}
							?>
						</td>
					</tr>
					<tr style="display:block;width:100%;">
						<td style="display:block;width:100%;padding-top:5px;text-align:center;font-weight: bold;font-size: 14px;line-height: 20px;color: #393F4C;" class="mcnTextContent"><?php _e( 'Top Pages', 'exactmetrics-premium' ); ?></td>
					</tr>
				</tbody>
			</table>

			<table align="center" border="0" cellpadding="0" cellspacing="0" width="64%" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" role="presentation">
				<tbody>
					<tr style="">
						<td style="width:67%;float:left;padding-top:30px;padding-bottom:10px;text-align:left;font-weight: normal;font-size: 12px;line-height: 14px;color: #9CA4B5;" class="mcnTextContent"><?php _e( 'Page Title', 'exactmetrics-premium' ); ?></td>
						<td style="width:33%;float:left;padding-top:30px;padding-bottom:10px;text-align:right;font-weight: normal;font-size: 12px;line-height: 14px;color: #9CA4B5;" class="mcnTextContent"><?php _e( 'Pageviews', 'exactmetrics-premium' ); ?></td>
					</tr>

					<?php $i = 0; ?>
					<?php while ( $i <= 2 ) : ?>
						<tr style="display:flex;">
							<td style="width:67%;float:left;padding-top:8px;padding-bottom:8px;border-bottom:1px solid #F0F2F4;text-align:left;font-weight: normal;font-size: 14px;line-height: 16px;color: #393F4C;overflow:hidden;" class="mcnTextContent"><a href="<?php echo esc_url( $top_pages[$i]['hostname'] . $top_pages[$i]['url'] ); ?>" target="_blank" style="text-decoration:none;color: #393F4C;"><?php echo $i + 1 . '. ' . exactmetrics_trim_text( $top_pages[$i]['title'], 2 ); ?></a></td>
							<td style="width:33%;float:left;padding-top:8px;padding-bottom:8px;border-bottom:1px solid #F0F2F4;text-align:right;font-weight: normal;font-size: 14px;line-height: 16px;color: #338EEF;overflow:hidden;text-overflow: ellipsis;" class="mcnTextContent"><?php echo number_format_i18n( $top_pages[$i]['sessions'] ); ?></td>
						</tr>
						<?php $i++; ?>
					<?php endwhile; ?>	

					<tr style="display:flex;">
						<td style="width:67%;float:left;padding-top:18px;text-align:left;font-weight: normal;font-size: 12px;line-height: 14px;color: #9CA4B5;text-decoration: underline;" class="mcnTextContent"><a href="<?php echo $more_pages; ?>" style="color: #9CA4B5;"><?php _e( 'View More', 'exactmetrics-premium'); ?></a></td>
					</tr>
				</tbody>
			</table>

			<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" role="presentation">
				<tbody>
                    <tr style="display:block;width:100%;">
                      <td style="width:100%;display:block;height: 50px;border-bottom:1px solid #F0F2F4;"></td>
                    </tr>
                </tbody>
            </table>
		<?php endif; ?>

		<?php if( ! empty( $top_referrals ) )  : ?>
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" role="presentation">
				<tbody>
					<tr style="display:block;width:100%;padding: 40px 0 0 0;">
						<td style="display:block;width:100%;text-align:center;">
							<?php 
						  		if( ! empty( $icon_referrals ) ) {
						  			echo '<img src="' . esc_url( $icon_referrals ) . '" srcset="' . esc_url( $icon_referrals_2x ) . ' 2x" target="_blank" alt="' . __( 'Referrals', 'exactmetrics-premium' ) . '" />';
						  		}
						  	?>
						</td>
					</tr>
					<tr style="display:block;width:100%;">
						<td style="display:block;width:100%;padding-top:5px;text-align:center;font-weight: bold;font-size: 14px;line-height: 20px;color: #393F4C;" class="mcnTextContent"><?php _e( 'Top Referrals', 'exactmetrics-premium' ); ?></td>
					</tr>
				</tbody>
			</table>

			<table align="center" border="0" cellpadding="0" cellspacing="0" width="64%" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" role="presentation">
				<tbody>
					<tr style="">
						<td style="width:67%;float:left;padding-top:30px;padding-bottom:10px;text-align:left;font-weight: normal;font-size: 12px;line-height: 14px;color: #9CA4B5;" class="mcnTextContent"><?php _e( 'Page Title', 'exactmetrics-premium' ); ?></td>
						<td style="width:33%;float:left;padding-top:30px;padding-bottom:10px;text-align:right;font-weight: normal;font-size: 12px;line-height: 14px;color: #9CA4B5;" class="mcnTextContent"><?php _e( 'Sessions', 'exactmetrics-premium' ); ?></td>
					</tr>

					<?php $i = 0; ?>
					<?php while ( $i <= 2 ) : ?>
						<tr style="display:flex;">
							<td style="width:67%;float:left;padding-top:8px;padding-bottom:8px;border-bottom:1px solid #F0F2F4;text-align:left;font-weight: normal;font-size: 14px;line-height: 16px;color: #393F4C;overflow:hidden;" class="mcnTextContent"><a href="<?php echo esc_url( $top_referrals[$i]['url'] ); ?>" target="_blank" style="text-decoration:none;color: #393F4C;"><?php echo $i + 1 . '. ' . $top_referrals[$i]['url']; ?></a></td>
							<td style="width:33%;float:left;padding-top:8px;padding-bottom:8px;border-bottom:1px solid #F0F2F4;text-align:right;font-weight: normal;font-size: 14px;line-height: 16px;color: #338EEF;overflow:hidden;text-overflow: ellipsis;" class="mcnTextContent"><?php echo number_format_i18n( $top_referrals[$i]['sessions'] ); ?></td>
						</tr>
						<?php $i++; ?>
					<?php endwhile; ?>

					<tr style="display:flex;">
						<td style="width:67%;float:left;padding-top:18px;text-align:left;font-weight: normal;font-size: 12px;line-height: 14px;color: #9CA4B5;text-decoration: underline;" class="mcnTextContent"><a href="<?php echo $more_referrals; ?>" style="color: #9CA4B5;"><?php _e( 'View More', 'exactmetrics-premium' ); ?></a></td>
					</tr>
				</tbody>
			</table>

			<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" role="presentation">
				<tbody>
                    <tr style="display:block;width:100%;">
                      <td style="width:100%;display:block;height: 50px;border-bottom:1px solid #F0F2F4;"></td>
                    </tr>
                </tbody>
            </table>
        <?php endif; ?>
	</td>
</tr>

<?php if ( isset( $info_block['title'] ) && ! empty( $info_block['title'] ) ) : ?>
	<tr style="display:block;padding:40px;" class="tipContent">
		<td style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
			<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" role="presentation">
				<tr style="display:block;">
					<td style="padding:30px 40px;background:#F1F7FE;border-radius:4px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
						<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" role="presentation">
							<tbody>
		                        <tr style="display:block;width:100%;">
		                          <td style="width:100%;display:block;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #338EEF;font-family: Helvetica;font-size: 9px;line-height: 10px;text-align: left;text-transform: uppercase;font-weight:normal;" class="mcnTextContent">
		                          		<?php 
									  		if( ! empty( $icon_announcement ) ) {
									  			echo '<img style="margin-bottom: -3px;margin-right: 2px;" src="' . esc_url( $icon_announcement ) . '" srcset="' . esc_url( $icon_announcement_2x ) . ' 2x" target="_blank" alt="' . __( 'Tip: ', 'exactmetrics-premium' ) . '" />';
									  		}
									  	?>
		                          		<?php _e( 'Pro Tip from our experts', 'exactmetrics-premium'); ?>
		                          </td>
		                        </tr>
		                        <tr style="display:block;width:100%;" class="mcnTextContent">
		                          <td style="width:100%;display:block;color: #393F4C;font-family: Helvetica;font-size: 20px;line-height: 24px;text-align: left;font-weight:bold;padding-top:18px"><?php echo $info_block['title']; ?></td>
		                        </tr>
		                        <tr style="display:block;width:100%;" class="mcnTextContent">
		                          <td style="width:100%;padding-bottom:25px;display:block;color: #393F4C;font-family: Helvetica;font-size: 10px;line-height: 15px;text-align: left;font-weight:normal;padding-top:20px"><?php echo $info_block['html']; ?></td>
		                        </tr>
		                        <?php if ( isset( $info_block['link_text'] ) && ! empty( $info_block['link_text'] ) && isset( $info_block['link_url'] ) && ! empty( $info_block['link_url'] ) ) : ?>
			                        <tr style="display:block;width:100%;" class="mcnTextContent">
			                          <td style="display: inline-block;"><a style="color: #fff;background: #338EEF;font-family: Helvetica;font-size: 12px;text-decoration:none;border-radius:3px;border-top: 8px solid #338EEF;border-bottom: 8px solid #338EEF;border-right: 19px solid #338EEF;border-left: 19px solid #338EEF;" href="<?php echo $info_block['link_url']; ?>"><?php echo $info_block['link_text']; ?></a></td>
			                        </tr>
		                        <?php endif; ?>
		                    </tbody>
		                </table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
<?php endif;