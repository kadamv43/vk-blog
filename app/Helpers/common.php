<?php

use App\Models\AssetImage;
use App\Models\AssetInfo;
use App\Models\SubLocation;
use App\Models\SysConfig;
use App\Models\Vendor;
use App\Models\User;
use App\Models\Userdetails;

function toSlug($string)
{
    return str_replace(' ', '-', strtolower($string));
}

function format_table_column($column_name): string
{
    $columnNameParts = str_replace('_', ' ', $column_name);
    $columnNameParts = explode(' ', $columnNameParts ?? $column_name);
    $capitalizedParts = array_map(function ($part) {
        $lowercasePart = strtolower($part);
        // Check if the word is not in the excluded list
        if (!in_array($lowercasePart, CONST_EXCLUDE_CAPITALIZE_ARR)) {
            // Capitalize the word except 'id' and 'po'
            if ($lowercasePart !== 'id' && $lowercasePart !== 'po') {
                return ucfirst($part);
            } else {
                return strtoupper($part);
            }
        }
        // If the word is in the excluded list, keep it lowercase
        return $part;
    }, $columnNameParts);

    return implode(' ', $capitalizedParts);
}
function format_table_column_array($column_name_array): array
{
    $formated_column = [];
    foreach ($column_name_array as $column_name) {
        $columnNameParts = str_replace('_', ' ', $column_name);
        $columnNameParts = explode(' ', $columnNameParts ?? $column_name);
        $capitalizedParts = array_map(function ($part) {
            $lowercasePart = strtolower($part);
            // Check if the word is not in the excluded list
            if (!in_array($lowercasePart, CONST_EXCLUDE_CAPITALIZE_ARR)) {
                // Capitalize the word except 'id' and 'po'
                if (!in_array($lowercasePart, CONST_UPPERCASE_STRING)) {
                    return ucfirst($part);
                } else {
                    return strtoupper($part);
                }
            }
            // If the word is in the excluded list, keep it lowercase
            return $part;
        }, $columnNameParts);

        $formated_column[] = implode(' ', $capitalizedParts);
    }
    return $formated_column;
}
function dataFieldLabel($dataField)
{
    if (array_key_exists($dataField, CONST_DATA_FIELD_MAPPING_NAMES)) {
        return CONST_DATA_FIELD_MAPPING_NAMES;
    }
    return false;
}
function map_table_columns($column_names_array)
{
    $mapped_array = array();
    if (!empty($column_names_array)) {
        foreach ($column_names_array as $column_name) {
            $mapped_array[] = dataFieldLabel($column_name) ? dataFieldLabel($column_name)[$column_name] : $column_name;
        }

        return $mapped_array;
    }
    return "Please pass a valid array as parameter";
}
function reverse_map_table_columns($mapped_column_names_array)
{
    $original_array = array();
    if (!empty($mapped_column_names_array)) {
        foreach ($mapped_column_names_array as $mapped_column_name) {
            $original_column_name = array_search($mapped_column_name, CONST_DATA_FIELD_MAPPING_NAMES, true);
            if ($original_column_name !== false) {
                // If a mapping is found, add it to the original array
                $original_array[] = $original_column_name;
            } else {
                // If no mapping found, check by looping the CONST_DATA_FIELD
                foreach (CONST_DATA_FIELD_MAPPING_NAMES as $original_column_name => $mapped_name) {
                    // Check if the mapped name contains the provided mapped column name
                    if (strpos($mapped_name, $mapped_column_name) !== false) {
                        // If a mapping is found, add the original column name to the original array
                        $original_array[] = $original_column_name;
                        // Break out of the loop since we found a match
                        break;
                    }
                }
                // If no mapping found, add the mapped column name itself to the original array
                $original_array[] = $mapped_column_name;
            }
        }

        return $original_array;
    }
    return "Please pass a valid array as parameter";
}

function formatHeadings($headings)
{
    // Remove underscores and ucwords
    $formattedHeadings = [];

    foreach ($headings as $heading) {
        // Remove underscores and ucwords
        $formattedHeading = ucwords(str_replace('_', ' ', $heading));

        // Add the formatted heading to the array
        $formattedHeadings[] = (string) format_table_column($formattedHeading);
    }

    return $formattedHeadings;
}

function hasAutoAssetID($company_id)
{
    return SysConfig::getAutoAssetIDoption($company_id);
}

function autoGenerateAssetCode($company_id, $locationID = null, $subLocationID = null, $vendorID = null)
{
    $settings_sample = '{
        "codePrefix":"Saurav",
        "codeSeparator":"\/",
        "serialNumberLength":4,
        "additionalParameters":[
            "company_name",
            "location_id",
            "sub_location_id",
            "current_date",
            "current_day",
            "current_month",
            "current_year",
            "vendor_name"
        ],
        "uppercase":1,
        "freshIncrement":1,
        "incrementByLocation":1, // not in use now -- may be required in future
        "incrementBySubLocation":false // not in use now -- may be required in future
    }';

    $assetCode = "";
    $tempAssetCode = "";
    $autoAssetIDSettings = SysConfig::getAutoAssetIDSettings($company_id);
    $assetIDConfiguration = json_decode($autoAssetIDSettings);
    $codePrefix = $assetIDConfiguration->codePrefix;
    $uppercase = $assetIDConfiguration->uppercase;
    $codeSeparator = $assetIDConfiguration->codeSeparator;
    $serialNumberLength = $assetIDConfiguration->serialNumberLength;
    $freshIncrement = $assetIDConfiguration->freshIncrement;

    $additionalParameters = $assetIDConfiguration->additionalParameters;
    if ($codePrefix) {
        if ($uppercase) {
            $assetCode .= strtoupper($codePrefix) . $codeSeparator;
        } else {
            $assetCode .= $codePrefix . $codeSeparator;
        }
    }

    foreach ($additionalParameters as $parameter) {
        switch ($parameter) {
            case 'company_name':
                if ($uppercase) {
                    $assetCode .= strtoupper(str_replace(' ', "_", $company_id));
                } else {
                    $assetCode .= str_replace(' ', "_", $company_id);
                }
                break;
            case 'location_id':
                if ($locationID) {
                    if ($assetCode) {
                        $assetCode .= strtoupper(str_replace(' ', "_", $locationID));
                    } else {
                        $assetCode .= str_replace(' ', "_", $locationID);
                    }
                }
                break;
            case 'sub_location_id':
                if ($subLocationID) {
                    $subLocation = SubLocation::find($subLocationID);
                    if ($uppercase) {
                        $assetCode .= strtoupper(str_replace(' ', "_", $subLocation->building_name));
                    } else {
                        $assetCode .= str_replace(' ', "_", $subLocation->building_name);
                    }
                }
                break;
            case 'current_date':
                $assetCode .= date('d-m-Y');
                break;

            case 'current_day':
                $assetCode .= date('d');
                break;
            case 'current_month':
                $assetCode .= date('m');
                break;
            case 'current_year':
                $assetCode .= date('Y');
                break;

            case 'vendor_name':
                if ($vendorID) {
                    $vendor = Vendor::find($vendorID);
                    if ($uppercase) {
                        $assetCode .= strtoupper(str_replace(' ', "_", $vendor->vendor_name));
                    } else {
                        $assetCode .= str_replace(' ', "_", $vendor->vendor_name);
                    }
                }
                break;
        }
        if ($assetCode !== $tempAssetCode) {
            $assetCode .= $codeSeparator;
        }
        $tempAssetCode = $assetCode;
    }
    if ($freshIncrement == true) {
        $increment = get_increment($company_id);
        $assetCode .= str_pad($increment, $serialNumberLength, '0', STR_PAD_LEFT);
    } else {
        $assetCode .= str_pad(AssetInfo::getActiveAssetByCompany(), $serialNumberLength, '0', STR_PAD_LEFT);
    }

    return $assetCode;
}

function get_increment($company_id)
{
    $newAssetIDLastCount = AssetInfo::getNewAssetIDCount($company_id);
    return $newAssetIDLastCount + 1;
}

function autoAssetManadatory($company_id)
{
    if (hasAutoAssetID($company_id)) {
        $autoAssetIDSettings = SysConfig::getAutoAssetIDSettings($company_id);
        $assetIDConfiguration = json_decode($autoAssetIDSettings);
        $additionalParameters = $assetIDConfiguration->additionalParameters;
        $databaseFields = ['location_id', 'sub_location_id', 'vendor_id'];
        $mandatotyFields = array_intersect($additionalParameters, $databaseFields);
        return $mandatotyFields;
    }

    return false;
}

function getUserRolesbyUserName($username)
{
    $user = User::with('roles')->where('email', $username)->first();
    return $user->roles;
}
function group_permissions($permissions = []): array
{
    $permission_by_group = [];
    foreach ($permissions as $permission) {
        $permission_name = strtolower(str_replace(" ", "_", $permission->name));
        $permission_group_data = PERMISSIONS[$permission_name];
        $group = $permission_group_data['group'];
        $label = $permission_group_data['label'];

        // Initialize the group if it does not exist
        if (!isset($permission_by_group[$group])) {
            $permission_by_group[$group] = [];
        }

        // Add permission to the group
        $permission_by_group[$group][] = [
            'name' => $permission->name,
            'label' => $label,
            'id' => $permission->id
        ];
    }

    // Sort the permissions within each group alphabetically by label
    foreach ($permission_by_group as $group => &$permissions) {
        usort($permissions, function ($a, $b) {
            return strcmp($a['label'], $b['label']);
        });
    }

    // Sort the groups alphabetically by group name
    ksort($permission_by_group);

    return $permission_by_group;
}

function is_admin($username)
{
    return $is_admin_user = Userdetails::where('username', $username)->count();

}

function getAssetImgages($asset_id, $company = null)
{
    $images = AssetImage::where('asset_id', $asset_id)->where('company_id', $company ?? session()->get('company'))->get();
    if (count($images))
        return $images;

    return false;
}

function shortenFilename($filename, $maxLength = 20)
{
    // Define the placeholder for the omitted part
    $placeholder = '...';

    // Get the length of the placeholder
    $placeholderLength = strlen($placeholder);

    // Calculate the maximum length for the base name
    $maxBaseLength = $maxLength - $placeholderLength;

    // Extract the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // Calculate the total allowed length for the filename without extension
    $allowedBaseLength = $maxBaseLength - strlen($extension) - 1; // -1 for the dot

    // Remove the extension from the filename
    $nameWithoutExtension = substr($filename, 0, strrpos($filename, '.'));

    // If the name without extension is longer than the allowed length, shorten it
    if (strlen($nameWithoutExtension) > $allowedBaseLength) {
        $partLength = intval($allowedBaseLength / 2);

        // Get the start and end parts of the filename
        $startPart = substr($nameWithoutExtension, 0, $partLength);
        $endPart = substr($nameWithoutExtension, -$partLength);

        // Combine the start part, placeholder, and end part
        $shortenedName = $startPart . $placeholder . $endPart;
    } else {
        $shortenedName = $nameWithoutExtension;
    }

    // Combine the shortened name with the extension
    return $shortenedName . '.' . $extension;
}

function generate_sub_location_id($company_slug,$building, $floor, $area)
{
    $parts = [];

    // Add company slug if available
    if ($company_slug) {
        $parts[] = strtolower(trim($company_slug));
    }

    // Function to clean individual strings
    $clean = function ($string) {
        // Remove special characters except letters and numbers
        $string = preg_replace('/[^a-zA-Z0-9]/', '', $string);
        return strtolower(substr($string, 0, 3));
    };

    // Clean and push non-empty values
    foreach ([$building, $floor, $area] as $item) {
        if (!empty($item)) {
            $cleaned = $clean($item);
            if (!empty($cleaned)) {
                $parts[] = $cleaned;
            }
        }
    }

    return implode('-', $parts);
}

function price_format($price){
 return strtoupper(session('_currency')) .' '.number_format($price);
}


function format_cost_in_k($amount)
{
    if ($amount >= 1000) {
        return round($amount / 1000, 2) . 'K';
    }
    return (string) $amount;
}


