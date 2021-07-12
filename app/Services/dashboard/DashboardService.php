<?php

namespace App\Services\Dashboard;

use App\Contracts\Dao\Dashboard\DashboardDaoInterface;
use App\Contracts\Services\Dashboard\DashboardServiceInterface;

class DashboardService implements DashboardServiceInterface
{
    private $dashboardDao;

    /**
     * Constructor class
     */
    public function __construct(DashboardDaoInterface $dashboardDao)
    {
        $this->dashboardDao = $dashboardDao;
    }

    /**
     * Get Dashboard data
     * @param -
     * @return Object
     */
    public function getAllPostListData()
    {
        return $this->dashboardDao->getAllPostListData();
    }
}
