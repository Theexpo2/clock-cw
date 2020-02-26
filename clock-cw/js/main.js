jQuery(document).ready(function($){
	function Clock_CW() {
		var hora = $('#clock-cw .hora').text();
		var minuto = $('#clock-cw .minuto').text();
		var segundo = $('#clock-cw .segundo').text();
		var pm = $('#clock-cw .pm').text();

		if ( segundo == 59 ) {
			segundo = '0';
			if ( minuto == 59 ) {
				minuto = '0';
				if ( hora == 12 ) {
					hora = 1;
				} else {
					hora++;
					if ( hora == 12 ) {
						if ( pm == 'pm' ) {
							pm = 'am';
						} else {
							pm = 'pm';
						}
						$('#clock-cw .pm').text( pm );
					}
				}
				if ( hora < 10 ) {
					hora = '0' + hora;
				}
				$('#clock-cw .hora').text( hora );
			} else {
				minuto++;
			}
			if ( minuto < 10 ) {
				minuto = '0' + minuto;
			}
			$('#clock-cw .minuto').text( minuto );
		} else {
			segundo++;
		}
		if ( segundo < 10 ) {
			segundo = '0' + segundo;
		}
		$('#clock-cw .segundo').text( segundo );		

		setTimeout(Clock_CW, 1000);
	} 
	Clock_CW(); 
});