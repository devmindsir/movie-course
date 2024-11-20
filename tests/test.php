<?php
//
//namespace App\Models;
//
//use App\Core\Model;
//
//class options extends Model
//{
//    protected $table='options';
//    public function __construct()
//    {
//        parent::__construct();
//    }
//
//    public function getOptions(): array
//    {
//        $options=$this->all();
//        $result=[];
//        foreach ($options as $option){
//            $setting=$option->setting;
//            $value=$option->value;
//            $result[$setting]=$value;
//        }
//        return $result;
//    }
//
//    public function getNavWithCategories(): array
//    {
//        $results = $this->fetchNavData();
//        return $this->processNavData($results);
//    }
//
//    private function fetchNavData(): array
//    {
//        $query = "
//        SELECT
//            nav.id AS nav_id,
//            nav.title AS nav_title,
//            product_categories.id AS product_category_id,
//            product_categories.title AS product_category_name,
//            product_categories.child AS product_child,
//            course_categories.id AS course_category_id,
//            course_categories.title AS course_category_name,
//            course_categories.child AS course_child
//        FROM
//            nav
//        LEFT JOIN
//            product_categories ON nav.id = product_categories.parent
//        LEFT JOIN
//            course_categories ON nav.id = course_categories.parent
//    ";
//
//        return $this->db->doSelect($query);
//
//    }
//
//    private function processNavData(array $results): array
//    {
//        $finalResults = [];
//
//        foreach ($results as $row) {
//            $navId = $row['nav_id'];
//            if (!isset($finalResults[$navId])) {
//                $finalResults[$navId] = $this->initializeNavItem($row);
//            }
//            $this->addChild($finalResults[$navId], $row);
//        }
//        dd($finalResults);
//
//        $this->addSubchildren($finalResults, $results);
//
//        return array_values($finalResults);
//    }
//
//    private function initializeNavItem(array $row): array
//    {
//        return [
//            'nav' => [
//                'id' => $row['nav_id'],
//                'title' => $row['nav_title']
//            ],
//            'children' => []
//        ];
//    }
//
//    private function addChild(array &$navItem, array $row): void
//    {
//        if ($row['product_category_id'] && $row['product_child'] == 0) {
//            $navItem['children'][] = [
//                'type' => 'product',
//                'id' => $row['product_category_id'],
//                'name' => $row['product_category_name'],
//                'subchildren' => []
//            ];
//        }
//
//        if ($row['course_category_id'] && $row['course_child'] == 0) {
//            $navItem['children'][] = [
//                'type' => 'course',
//                'id' => $row['course_category_id'],
//                'name' => $row['course_category_name'],
//                'subchildren' => []
//            ];
//        }
//    }
//
//    private function addSubchildren(array &$finalResults, array $results): void
//    {
//        foreach ($results as $row) {
//            if ($row['product_child'] != 0) {
//                $this->addSubchild($finalResults, $row, 'product', $row['product_child'], $row['product_category_id'], $row['product_category_name']);
//            }
//
//            if ($row['course_child'] != 0) {
//                $this->addSubchild($finalResults, $row, 'course', $row['course_child'], $row['course_category_id'], $row['course_category_name']);
//            }
//        }
//    }
//
//    private function addSubchild(array &$finalResults, array $row, string $type, int $childId, int $categoryId, string $categoryName): void
//    {
//        foreach ($finalResults as &$navItem) {
//            foreach ($navItem['children'] as &$child) {
//                if ($child['type'] === $type && $child['id'] === $childId) {
//                    $child['subchildren'][] = [
//                        'id' => $categoryId,
//                        'name' => $categoryName
//                    ];
//                }
//            }
//        }
//    }
//}
//            <nav class="nav header-navbar">
//                <ul class="flex-start gap-4">
//                    <?php foreach ($navData as $navItem): ?>
<!--                    <li class="nav-link" data-time="--><?//= htmlspecialchars($navItem['nav']['id']) ?><!--">-->
<!--                        <a href="#">--><?//= htmlspecialchars($navItem['nav']['title']) ?><!--</a>-->
<!--                    --><?php //if (!empty($navItem['children'])): ?><!-- <!-- بررسی وجود فرزندان -->-->
<!--                        <ul class="nav-submenu Submenu2 p-shadow">-->
<!--                            <div class="nav-submenu-right h-100 w-100">-->
<!--                                <ul class="h-100 nav-submenu-list bg-secondary w-25">-->
<!--                                    --><?php //foreach ($navItem['children'] as $child): ?>
<!--                                    <li class="nav-submenu-item flex-between py-4 px-3 c-pointer" data-time="--><?//= htmlspecialchars($child['id']) ?><!--">-->
<!--                                        <div class="nav-submenu2-item">-->
<!--                                            <img width="25" height="25" src="https://img.icons8.com/fluency/48/javascript.png" alt="--><?//= htmlspecialchars($child['name']) ?><!--" />-->
<!--                                            <a class="text-subtitle fs-4">--><?//= htmlspecialchars($child['name']) ?><!--</a>-->
<!--                                        </div>-->
<!--                                        <i class="fas fa-chevron-left text-subtitle fs-5"></i>-->
<!--                                        --><?php //if (!empty($child['subchildren'])): ?>
<!--                                        <ul class="nav-submenu-sub Submenu3 p-6 flex-between overflow-hidden h-100">-->
<!--                                            <div class="w-25">-->
<!--                                                --><?php //foreach ($child['subchildren'] as $subchild): ?>
<!--                                                <li class="nav-item-hover flex-between text-subtitle mb-6">-->
<!--                                                    <div class="flex-start gap-2">-->
<!--                                                        <span>--><?//= htmlspecialchars($subchild['name']) ?><!--</span>-->
<!--                                                    </div>-->
<!--                                                    <i class="fas fa-chevron-left fs-5"></i>-->
<!--                                                </li>-->
<!--                                                --><?php //endforeach; ?>
<!--                                            </div>-->
<!--                                        </ul>-->
<!--                                        --><?php //else: ?>
<!--                                    <!-- نمایش پیام در صورت عدم وجود زیرمنو -->-->
<!--                                        <div class="no-products-message">هیچ محصولی وجود ندارد</div>-->
<!--                                        --><?php //endif; ?>
<!--                                    </li>-->
<!--                                    --><?php //endforeach; ?>
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </ul>-->
<!--                    --><?php //endif; ?><!-- <!-- پایان بررسی وجود فرزندان -->-->
<!--                    </li>-->
<!--                --><?php //endforeach; ?><!-- <!-- پایان حلقه navData -->-->
<!--                </ul>-->
<!--            </nav>-->