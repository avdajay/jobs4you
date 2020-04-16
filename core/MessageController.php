<?php

use Carbon\Carbon;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;
        
        $query = "SELECT c.*, m.*, e.name AS employerName, e.logo AS employerLogo, a.name AS applicantsName, a.photo AS applicantsPhoto FROM
        (SELECT message_id, max(sent_at) as lastSent
        FROM chats
        GROUP BY message_id) ch
        INNER JOIN chats c ON c.message_id = ch.message_id AND c.sent_at = ch.lastSent
        INNER JOIN messages m ON c.message_id = m.id
        INNER JOIN employers e ON e.user_id = m.initiator_id
        INNER JOIN applicants a ON a.user_id = m.receiver_id
        WHERE m.initiator_id = :id OR receiver_id = :id ORDER BY message_id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['id' => $_SESSION['uid']]);
        $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return view('dashboard/messages', ['messages' => $messages]);
    }

    public function view($id)
    {
        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        $query = "SELECT c.*, m.*, e.name AS employerName, e.logo AS employerLogo, a.name AS applicantsName, a.photo AS applicantsPhoto FROM
        (SELECT message_id, max(sent_at) as lastSent
        FROM chats
        GROUP BY message_id) ch
        INNER JOIN chats c ON c.message_id = ch.message_id AND c.sent_at = ch.lastSent
        INNER JOIN messages m ON c.message_id = m.id
        INNER JOIN employers e ON e.user_id = m.initiator_id
        INNER JOIN applicants a ON a.user_id = m.receiver_id
        WHERE m.initiator_id = :id OR receiver_id = :id ORDER BY message_id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['id' => $_SESSION['uid']]);
        $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $query = "SELECT m.initiator_id, m.receiver_id, e.name AS employerName, e.logo AS employerLogo, a.name AS applicantsName, a.photo AS applicantsPhoto, c.message_id, c.user_id, c.content, c.sent_at FROM chats c
        INNER JOIN messages m ON m.id = c.message_id
        INNER JOIN employers e ON e.user_id = m.initiator_id
        INNER JOIN applicants a ON a.user_id = m.receiver_id
        WHERE message_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['id' => $id]);
        $chats = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return view('dashboard/messages', ['messages' => $messages, 'chats' => $chats]);
    }

    public function reply($id)
    {
        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        $data = [
            'mid'      => $this->sanitize($id),
            'uid'      => $_SESSION['uid'],
            'message'  => $this->sanitize($_POST['message']),
            'dateTime' => Carbon::now('Asia/Manila'),
        ];

        $query = "INSERT INTO chats (message_id, user_id, content, sent_at) VALUES (:mid, :uid, :message, :dateTime)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute($data);

        array_push($_SESSION['success'], ['success' => 'A reply has been sent!']);

    }

    public function messageCheck($userID, $receiverID)
    {
        $db = new Database();
        $cdb = $db->connect();
        $this->conn = $cdb;

        $query = "SELECT * FROM messages WHERE initiator_id=:id AND receiver_id=:rid";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['id' => $userID, 'rid' => $receiverID]);
        $message = $stmt->fetch(PDO::FETCH_ASSOC);

        $value = $message['id'];
        
        return $value;
    }

    public function create($userID, $initatorID, $receiverID, $summary)
    {
        $messageID = $this->messageCheck($userID, $receiverID);

        if (isset($messageID))
        {
            $data = [
                'mid'      => $this->sanitize($messageID),
                'uid'      => $this->sanitize($userID),
                'message'  => $this->sanitize($summary),
                'dateTime' => Carbon::now('Asia/Manila'),
            ];  

            $query = "INSERT INTO chats (message_id, user_id, content, sent_at) VALUES (:mid, :uid, :message, :dateTime)";
            $stmt = $this->conn->prepare($query);
            $stmt->execute($data);
        }
        else
        {
            $messageData = [
                'iid'     => $this->sanitize($initatorID),
                'rid'     => $this->sanitize($receiverID),
                'created' => Carbon::now('Asia/Manila'),
                'updated' => Carbon::now('Asia/Manila'),
            ];

            $query = "INSERT INTO messages (initiator_id, receiver_id, created_at, updated_at) VALUES (:iid, :rid, :created, :updated)";
            $stmt = $this->conn->prepare($query);
            $stmt->execute($messageData);
            $lastId = $this->conn->lastInsertId();

            $chatData = [
                'mid'     => $lastId,
                'uid'     => $initatorID,
                'content' => $summary,
                'sent'    => Carbon::now('Asia/Manila'),
            ];

            $query = "INSERT INTO chats (message_id, user_id, content, sent_at) VALUES (:mid, :uid, :content, :sent)";
            $stmt = $this->conn->prepare($query);
            $stmt->execute($chatData);
        }
        
    }
}