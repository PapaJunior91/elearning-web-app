<?php
class pdf_model extends CI_Model
{

	function show_single_details($user_id)
	{
		$this->db->where('user_id', $user_id);
		$data = $this->db->get('login');

		$output = '<table width="100%" cellspacing="5" cellpadding="5">';
		foreach($data->result() as $row)
		{
			$output .= '
			<tr>
				<td width="25%"><img src="'.base_url().'images/'.$row->user_id.'" /></td>
				<td width="75%">
					<p><b>ID : </b>'.$row->user_id.'</p>
					<p><b>Name : </b>'.$row->username.'</p>
					<p><b>Email : </b>'.$row->email_address.'</p>
				</td>
			</tr>
			';
		}
		$output .= '</table>';
		return $output;
	}
}





?>
