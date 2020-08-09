<?php

class DashboardController extends Controller
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

        $query = "SELECT id FROM resume WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['user_id' => $_SESSION['uid']]);
        $resume = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $query = "SELECT id FROM applications WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['user_id' => $_SESSION['uid']]);
        $applications = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $query = "SELECT bookmarks.id FROM `bookmarks` INNER JOIN resume ON resume.id = bookmarks.bookmark_content WHERE resume.user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['user_id' => $_SESSION['uid']]);
        $bookmarks = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $query = "SELECT DISTINCT bookmark_user FROM bookmarks INNER JOIN resume ON resume.id = bookmarks.bookmark_content WHERE resume.user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['user_id' => $_SESSION['uid']]);
        $exposure = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $query = "SELECT * FROM jobs WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['user_id' => $_SESSION['uid']]);
        $jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $query = "SELECT * FROM bookmarks WHERE bookmark_user = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['user_id' => $_SESSION['uid']]);
        $bookmarksEmployer = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $query = "SELECT jobs.id, count(applications.id) AS jobCount FROM jobs INNER JOIN applications ON applications.job_id = jobs.id WHERE jobs.user_id = :user_id GROUP BY jobs.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['user_id' => $_SESSION['uid']]);
        $jobCount = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $query = "SELECT resume.* FROM `bookmarks` INNER JOIN `resume` ON `bookmarks`.`bookmark_content` = `resume`.`id` WHERE `bookmarks`.`bookmark_user` = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['user_id' => $_SESSION['uid']]);
        $bookmarksList = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $totalJobCount = 0;
        $singleCount = null;

        foreach ($jobCount as $count) {
            $totalJobCount = $totalJobCount + $count['jobCount'];

            if ($count['id'] == null) {
                $singleCount;
            } else {
                $singleCount = $jobCount;
            }
        }

        return view('dashboard/index', [
            'resume' => $resume,
            'applications' => $applications,
            'bookmarks' => $bookmarks,
            'exposure' => $exposure,
            'jobs' => $jobs,
            'count' => $singleCount,
            'totalCount' => $totalJobCount,
            'bookmarksEmployer' => $bookmarksEmployer,
            'bookmarksList' => $bookmarksList
        ]);
    }
}
