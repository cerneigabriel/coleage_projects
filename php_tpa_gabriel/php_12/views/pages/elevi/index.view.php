<?php
include VIEWS_PATH . 'components/~head.php';

global $orderBy, $direction, $directions;

$directions = ["ASC", "DESC", "NONE"];

$orderBy = isset($_REQUEST["orderBy"]) ? $_REQUEST["orderBy"] : "";
$direction = isset($_REQUEST["direction"]) && $orderBy != "" ? $_REQUEST["direction"] : "NONE";


function nextDirection(string $column)
{
    $next_index = array_search($GLOBALS["direction"], $GLOBALS["directions"], true);
    return $GLOBALS["direction"] !== "" && $GLOBALS["orderBy"] === $column ? $GLOBALS["directions"][$next_index + 1 !== count($GLOBALS["directions"]) ? $next_index += 1 : 0] : "ASC";
}

function currentDirection(string $column)
{
    return $GLOBALS["direction"] !== "" && $GLOBALS["orderBy"] === $column ? $GLOBALS["direction"] : "ASC";
}

function getSortIcon(string $column)
{
    $icons = [
        "ASC" => '<i class="fas fa-sort-up"></i>',
        "DESC" => '<i class="fas fa-sort-down"></i>',
        "NONE" => '<i class="fas fa-sort"></i>',
    ];

    return $GLOBALS["direction"] !== "" && $GLOBALS["orderBy"] === $column ? $icons[$GLOBALS["direction"]] : $icons["NONE"];
}

function filterIsChecked(string $field, string $value)
{
    if (isset($_REQUEST["filters"]) && isset($_REQUEST["filters"][$field]) && in_array($value, $_REQUEST["filters"][$field]))
        return true;

    return false;
}

function getFilterValues(string $field)
{
    if (isset($_REQUEST["filters"]) && isset($_REQUEST["filters"][$field])) return $_REQUEST["filters"][$field];
    return [];
}
?>



<table class="table" id="elevi">
    <thead class="thead-dark">
        <tr>
            <th colspan="<?php echo count($fields); ?>">
                <div class="w-100 row align-items-center justify-content-between">
                    <div class="col-lg-3">
                        <div class="row align-items-center m-0">
                            <label for="search" class="form-label">Search</label>
                            <div class="col px-3">
                                <input type="text" id="search" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                        <a href="?page=elevi" class="btn btn-outline-light btn-sm">Clear Filters</a>
                    </div>
                </div>
            </th>
        </tr>
        <tr>
            <?php foreach ($fields as $field => $_field) : ?>
                <th scope="col">
                    <div class="d-flex justify-content-between align-items-center">
                        <?php echo $_field["title"]; ?>

                        <div class="d-flex align-items-center">
                            <form class="m-0 <?php echo "filters_$field"; ?>" action="<?php echo url_builder('/'); ?>" method="GET">
                                <input type="hidden" name="page" value="elevi">

                                <?php if ($_field["sortable"]) : ?>

                                    <input type="hidden" id="<?php echo "field_{$field}_direction"; ?>" name="direction" value="<?php echo nextDirection($field); ?>">
                                    <input type="hidden" id="<?php echo "field_{$field}_orderBy"; ?>" name="orderBy" value="<?php echo $field; ?>">
                                    <input type="hidden" id="<?php echo "field_{$field}_page"; ?>" name="page" value="elevi">

                                    <button type="submit" class="btn btn-sm text-white py-0" data-direction-input="<?php echo "#field_{$field}_direction"; ?>" onclick="document.querySelector(this.getAttribute('data-direction-input')).disabled = false"><?php echo getSortIcon($field); ?></button>

                                <?php endif; ?>

                                <?php if ($_field["filterable"]) : ?>
                                    <div class="btn-group">
                                        <button class="btn btn-sm text-white dropwdown_filter py-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <?php if (!isset($_field["filters"]) || count($_field["filters"]) === 0) : ?>

                                                <?php foreach (array_keys(array_group_by($eleviAll, $field)) as $key => $item) : ?>

                                                    <div class="dropdown-item">
                                                        <input type="checkbox" class="form-check-input" id="<?php echo "filters_{$field}_{$key}"; ?>" name="<?php echo "filters[{$field}][]"; ?>" value="<?php echo $item; ?>" <?php echo filterIsChecked($field, $item) ? 'checked="checked"' : ''; ?>>

                                                        <label class="form-check-label" for="<?php echo "filters_{$field}_{$key}"; ?>">
                                                            <?php echo "{$item} (" . count(array_group_by($eleviAll, $field)[$item]) . ")"; ?>
                                                        </label>
                                                    </div>

                                                <?php endforeach; ?>

                                            <?php else : ?>

                                                <?php foreach ($_field["filters"] as $filter) : ?>

                                                    <?php if ($filter === "min") : ?>

                                                        <div class="dropdown-item">
                                                            <div class="form-group m-0">
                                                                <label for="<?php echo "filters[{$field}]min"; ?>" class="form-label">Min Value</label>
                                                                <input type="numeric" class="form-control" min="0" id="<?php echo "filters[{$field}]min"; ?>" name="<?php echo "filters[{$field}][min]"; ?>" value="<?php echo count(getFilterValues($field)) > 0 ? getFilterValues($field)[$filter] : ''; ?>">
                                                            </div>
                                                        </div>

                                                    <?php endif; ?>

                                                    <?php if ($filter === "max") : ?>

                                                        <div class="dropdown-item">
                                                            <div class="form-group m-0">
                                                                <label for="<?php echo "filters[{$field}]max"; ?>" class="form-label">Max Value</label>
                                                                <input type="numeric" class="form-control" min="0" id="<?php echo "filters[{$field}]max"; ?>" name="<?php echo "filters[{$field}][max]"; ?>" value="<?php echo count(getFilterValues($field)) > 0 ? getFilterValues($field)[$filter] : ''; ?>">
                                                            </div>
                                                        </div>

                                                    <?php endif; ?>

                                                    <?php if ($filter === "maxAge") : ?>

                                                        <div class="dropdown-item">
                                                            <div class="form-group m-0">
                                                                <label for="<?php echo "filters[{$field}]maxAge"; ?>" class="form-label">Max Age</label>
                                                                <input type="numeric" class="form-control" min="0" id="<?php echo "filters[{$field}]maxAge"; ?>" name="<?php echo "filters[{$field}][maxAge]"; ?>" value="<?php echo count(getFilterValues($field)) > 0 ? getFilterValues($field)[$filter] : ''; ?>">
                                                            </div>
                                                        </div>

                                                    <?php endif; ?>

                                                <?php endforeach; ?>

                                            <?php endif; ?>

                                            <div class="dropdown-divider"></div>

                                            <button class="dropdown-item" type="submit" data-direction-input="<?php echo "#field_{$field}_direction"; ?>" onclick="document.querySelector(this.getAttribute('data-direction-input')).disabled = true">Filter</button>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </form>
                        </div>
                    </div>
                </th>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($elevi as $elev) : ?>
            <tr>
                <td><?php echo $elev->id; ?></td>
                <td><?php echo $elev->nume; ?></td>
                <td><?php echo $elev->prenume; ?></td>
                <td><?php echo $elev->adresa; ?></td>
                <td><?php echo $elev->email; ?></td>
                <td><?php echo $elev->data_nasterii; ?></td>
                <td><?php echo $elev->sex; ?></td>
                <td><?php echo $elev->media_bac; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include VIEWS_PATH . 'components/~foot.php'; ?>