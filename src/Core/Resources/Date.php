<?php declare(strict_types=1);

/**
 * Date class to manage API dates.
 * This class also contains methods to make the intl objects easy to use for the SDK's users.
 */
namespace SDK\Core\Resources;

use DateTime;

/**
 * Date class to manage API dates.
 * This class also contains methods to make the intl objects easy to use for the SDK's users.
 *
 * @see Date::create()
 * @see Date::createFromFormat()
 * @see Date::getFormattedDateTime()
 * @see Date::setLocale()
 * @see Date::setDateType()
 * @see Date::setTimeType()
 * @see Date::setCalendarType()
 *
 * @see Date::originalFormat()
 *
 * @package SDK\Core\Resources
 */
class Date {

    private static string $locale = '';

    private static int $dateType = \IntlDateFormatter::MEDIUM;

    private static int $timeType = \IntlDateFormatter::MEDIUM;

    private static int $calendarType = \IntlDateFormatter::GREGORIAN;

    public const DATE_FORMAT = 'Y-m-d';

    public const DATETIME_FORMAT = DateTime::ATOM;

    private ?DateTime $dateTime = null;

    private string $dateFormat;

    private function __construct(string $dateTime, string $format = '', ?\DateTimeZone $timezone = null) {
        if (strlen($format) !== 0) {
            $this->dateTime = DateTime::createFromFormat($format, $dateTime, $timezone);
            $this->dateFormat = $format;
        }
        if (!$this->isValid()) {
            $this->constructDate($dateTime);
        }
    }

    private function constructDate($dateTime) {
        $createdDate = DateTime::createFromFormat(self::DATETIME_FORMAT, $dateTime);
        $createdDateFormat = self::DATETIME_FORMAT;
        if (!self::validDateTime($createdDate)) {
            $createdDate = DateTime::createFromFormat(self::DATE_FORMAT, $dateTime);
            if (self::validDateTime($createdDate)) {
                $createdDate->setTime(0, 0, 0, 0);
            }
            $createdDateFormat = self::DATE_FORMAT;
        }
        if (self::validDateTime($createdDate)) {
            $this->dateTime = $createdDate;
            $this->dateFormat = $createdDateFormat;
        }
    }

    private function isValid(): bool {
        return self::validDateTime($this->dateTime);
    }

    public static function validDateTime($dateTime): bool {
        return $dateTime instanceof DateTime;
    }

    /**
     * Returns the date on the original format it was created
     *
     * @return string
     */
    public function originalFormat(): string {
        return $this->dateTime->format($this->dateFormat);
    }

    /**
     *
     * @param string $dateTime
     *
     * @return Date|NULL
     */
    public static function create(string $dateTime): ?self {
        $createdDate = new self($dateTime);
        if ($createdDate->isValid()) {
            return $createdDate;
        }
        return null;
    }

    /**
     *
     * @param string $dateTime
     * @param string $format
     * @param \DateTimeZone $timezone
     *
     * @return Date|NULL
     */
    public static function createFromFormat(string $dateTime, string $format, ?\DateTimeZone $timezone = null): ?self {
        $createdDate = new self($dateTime, $format, $timezone);
        if ($createdDate->isValid()) {
            return $createdDate;
        }
        return null;
    }

    /**
     * Returns the given date as string into the setted locale with the setted formats
     *
     * @param DateTime|Date $dateTime
     *
     * @return string
     */
    public static function getFormattedDateTime($dateTime): string {
        if ($dateTime instanceof Date) {
            $dateTime = $dateTime->dateTime;
        }
        if (!$dateTime instanceof DateTime) {
            throw new \InvalidArgumentException();
        }
        return datefmt_format(datefmt_create(self::$locale, self::$dateType, self::$timeType, null, self::$calendarType), $dateTime);
    }

    /**
     * Returns the PHP date object
     *
     * @return DateTime
     */
    public function getDateTime(): ?DateTime {
        return $this->dateTime;
    }

    /**
     * Sets the locale to use on getFormattedDateTime method.
     *
     * @param string $locale
     *
     * @return void
     */
    public static function setLocale(string $locale): void {
        self::$locale = $locale;
    }

    /**
     * Sets the date type to use on getFormattedDateTime method.
     * It's recommended to use the enumeration on IntlDateFormatter class.
     *
     * @see \IntlDateFormatter
     *
     * @param int $dateType
     *
     * @return void
     */
    public static function setDateType(int $dateType): void {
        self::$dateType = $dateType;
    }

    /**
     * Sets the time type to use on getFormattedDateTime method.
     * It's recommended to use the enumeration on IntlDateFormatter class.
     *
     * @see \IntlDateFormatter
     *
     * @param int $timeType
     *
     * @return void
     */
    public static function setTimeType(int $timeType): void {
        self::$timeType = $timeType;
    }

    /**
     * Sets the calendar type to use on getFormattedDateTime method.
     * It's recommended to use the enumeration on IntlDateFormatter class.
     *
     * @see \IntlDateFormatter
     *
     * @param int $calendarType
     *
     * @return void
     */
    public static function setCalendarType(int $calendarType): void {
        self::$calendarType = $calendarType;
    }
}
