<?php
class Contact_Model extends Model {
	function __construct() {
		parent::__construct();
	}

	public function get_page_contact() {
		$aQuery = <<<SQL
		SELECT *
		FROM page_contact
		WHERE page_contact_id = 1
SQL;
		$data = $this->db->select($aQuery);

		echo json_encode($data[0]);
	}

	public function send_message() {
		$to = ADMIN_MAIL;
        $params = [
            "message_name" => $_POST['message_name'],
            "message_email" => $_POST['message_email'],
            "message_title" => $_POST['message_title'],
            "message_content" => $_POST['message_content']
        ];
        $email = new email_template();        
        /*         * ************************* */
        //if (!$mail->Send()) {
        if ($email->send($to, $params,'contact_message')) {
        	echo "success";
        }
	}
}