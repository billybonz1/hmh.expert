(function (factory) {
  typeof define === 'function' && define.amd ? define('wall', factory) :
  factory();
}((function () { 'use strict';

  // Fallback locale.
  // (when not a single one of the supplied "preferred" locales is available)
  var defaultLocale = 'en'; // For all locales added
  // their relative time formatter messages will be stored here.

  var localesData = {};
  function getDefaultLocale() {
    return defaultLocale;
  }
  function setDefaultLocale(locale) {
    defaultLocale = locale;
  } // export function isLocaleDataAvailable(locale) {
  //  return localesData.hasOwnProperty(locale)
  // }

  function getLocaleData(locale) {
    return localesData[locale];
  }
  function addLocaleData(localeData) {
    if (!localeData) {
      throw new Error('No locale data passed');
    } // This locale data is stored in a global variable
    // and later used when calling `.format(time)`.


    localesData[localeData.locale] = localeData;
  }

  /**
   * Resolves a locale to a supported one (if any).
   * @param  {string} locale
   * @param {Object} [options] - An object that may have the following property:
   * @param {string} [options.localeMatcher="lookup"] - The locale matching algorithm to use. Possible values are "lookup" and "best fit". Currently only "lookup" is supported.
   * @return {string} [locale]
   * @example
   * // Returns "sr"
   * resolveLocale("sr-Cyrl-BA")
   * // Returns `undefined`
   * resolveLocale("xx-Latn")
   */

  function resolveLocale(locale) {
    var options = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};
    var localeMatcher = options.localeMatcher || 'lookup';

    switch (localeMatcher) {
      case 'lookup':
        return resolveLocaleLookup(locale);
      // "best fit" locale matching is not supported.
      // https://github.com/catamphetamine/relative-time-format/issues/2

      case 'best fit':
        // return resolveLocaleBestFit(locale)
        return resolveLocaleLookup(locale);

      default:
        throw new RangeError("Invalid \"localeMatcher\" option: ".concat(localeMatcher));
    }
  }
  /**
   * Resolves a locale to a supported one (if any).
   * Starts from the most specific locale and gradually
   * falls back to less specific ones.
   * This is a basic implementation of the "lookup" algorithm.
   * https://tools.ietf.org/html/rfc4647#section-3.4
   * @param  {string} locale
   * @return {string} [locale]
   * @example
   * // Returns "sr"
   * resolveLocaleLookup("sr-Cyrl-BA")
   * // Returns `undefined`
   * resolveLocaleLookup("xx-Latn")
   */

  function resolveLocaleLookup(locale) {
    if (getLocaleData(locale)) {
      return locale;
    } // `sr-Cyrl-BA` -> `sr-Cyrl` -> `sr`.


    var parts = locale.split('-');

    while (locale.length > 1) {
      parts.pop();
      locale = parts.join('-');

      if (getLocaleData(locale)) {
        return locale;
      }
    }
  }

  function _classCallCheck(instance, Constructor) {
    if (!(instance instanceof Constructor)) {
      throw new TypeError("Cannot call a class as a function");
    }
  }

  function _defineProperties(target, props) {
    for (var i = 0; i < props.length; i++) {
      var descriptor = props[i];
      descriptor.enumerable = descriptor.enumerable || false;
      descriptor.configurable = true;
      if ("value" in descriptor) descriptor.writable = true;
      Object.defineProperty(target, descriptor.key, descriptor);
    }
  }

  function _createClass(Constructor, protoProps, staticProps) {
    if (protoProps) _defineProperties(Constructor.prototype, protoProps);
    if (staticProps) _defineProperties(Constructor, staticProps);
    return Constructor;
  }

  function _defineProperty(obj, key, value) {
    if (key in obj) {
      Object.defineProperty(obj, key, {
        value: value,
        enumerable: true,
        configurable: true,
        writable: true
      });
    } else {
      obj[key] = value;
    }

    return obj;
  }

  var UNITS = ["second", "minute", "hour", "day", "week", "month", "quarter", "year"]; // Valid values for the `numeric` option.

  var NUMERIC_VALUES = ["auto", "always"]; // Valid values for the `style` option.

  var STYLE_VALUES = ["long", "short", "narrow"];
  /**
   * Polyfill for `Intl.RelativeTimeFormat` proposal.
   * https://github.com/tc39/proposal-intl-relative-time
   * https://github.com/tc39/proposal-intl-relative-time/issues/55
   */

  var RelativeTimeFormat = /*#__PURE__*/function () {
    /**
     * @param {(string|string[])} [locales] - Preferred locales (or locale).
     * @param {Object} [options] - Formatting options.
     * @param {string} [options.style="long"] - One of: "long", "short", "narrow".
     * @param {string} [options.numeric="always"] - (Version >= 2) One of: "always", "auto".
     * @param {string} [options.localeMatcher="lookup"] - One of: "lookup", "best fit". Currently only "lookup" is supported.
     */
    function RelativeTimeFormat() {
      var locales = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : [];
      var options = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};

      _classCallCheck(this, RelativeTimeFormat);

      _defineProperty(this, "numeric", "always");

      _defineProperty(this, "style", "long");

      _defineProperty(this, "localeMatcher", "lookup");

      var numeric = options.numeric,
          style = options.style,
          localeMatcher = options.localeMatcher; // Set `numeric` option.

      if (numeric) {
        if (NUMERIC_VALUES.indexOf(numeric) < 0) {
          throw new RangeError("Invalid \"numeric\" option: ".concat(numeric));
        }

        this.numeric = numeric;
      } // Set `style` option.


      if (style) {
        if (STYLE_VALUES.indexOf(style) < 0) {
          throw new RangeError("Invalid \"style\" option: ".concat(style));
        }

        this.style = style;
      } // Set `localeMatcher` option.


      if (localeMatcher) {
        this.localeMatcher = localeMatcher;
      } // Set `locale`.
      // Convert `locales` to an array.


      if (typeof locales === 'string') {
        locales = [locales];
      } // Add default locale.


      locales.push(getDefaultLocale()); // Choose the most appropriate locale.

      this.locale = RelativeTimeFormat.supportedLocalesOf(locales, {
        localeMatcher: this.localeMatcher
      })[0];

      if (!this.locale) {
        throw new TypeError("No supported locale was found");
      }

      this.locale = resolveLocale(this.locale, {
        localeMatcher: this.localeMatcher
      }); // Use `Intl.NumberFormat` for formatting numbers (when available).

      if (typeof Intl !== 'undefined' && Intl.NumberFormat) {
        this.numberFormat = new Intl.NumberFormat(this.locale);
      }
    }
    /**
     * Formats time `value` in `units` (either in past or in future).
     * @param {number} value - Time interval value.
     * @param {string} unit - Time interval measurement unit.
     * @return {string}
     * @throws {RangeError} If unit is not one of "second", "minute", "hour", "day", "week", "month", "quarter".
     * @example
     * // Returns "2 days ago"
     * rtf.format(-2, "day")
     * // Returns "in 5 minutes"
     * rtf.format(5, "minute")
     */


    _createClass(RelativeTimeFormat, [{
      key: "format",
      value: function format(value, unit) {
        return this.getRule(value, unit).replace('{0}', this.formatNumber(Math.abs(value)));
      }
      /**
       * Formats time `value` in `units` (either in past or in future).
       * @param {number} value - Time interval value.
       * @param {string} unit - Time interval measurement unit.
       * @return {Object[]} The parts (`{ type, value }`).
       * @throws {RangeError} If unit is not one of "second", "minute", "hour", "day", "week", "month", "quarter".
       * @example
       * // Version 1.
       * // Returns [
       * //   { type: "literal", value: "in " },
       * //   { type: "day", value: "100" },
       * //   { type: "literal", value: " days" }
       * // ]
       * rtf.formatToParts(100, "day")
       * //
       * // Version 2.
       * // Returns [
       * //   { type: "literal", value: "in " },
       * //   { type: "integer", value: "100", unit: "day" },
       * //   { type: "literal", value: " days" }
       * // ]
       * rtf.formatToParts(100, "day")
       */

    }, {
      key: "formatToParts",
      value: function formatToParts(value, unit) {
        var rule = this.getRule(value, unit);
        var valueIndex = rule.indexOf("{0}"); // "yesterday"/"today"/"tomorrow".

        if (valueIndex < 0) {
          return [{
            type: "literal",
            value: rule
          }];
        }

        var parts = [];

        if (valueIndex > 0) {
          parts.push({
            type: "literal",
            value: rule.slice(0, valueIndex)
          });
        }

        parts.push({
          unit: unit,
          type: "integer",
          value: this.formatNumber(Math.abs(value))
        });

        if (valueIndex + "{0}".length < rule.length - 1) {
          parts.push({
            type: "literal",
            value: rule.slice(valueIndex + "{0}".length)
          });
        }

        return parts;
      }
      /**
       * Returns formatting rule for `value` in `units` (either in past or in future).
       * @param {number} value - Time interval value.
       * @param {string} unit - Time interval measurement unit.
       * @return {string}
       * @throws {RangeError} If unit is not one of "second", "minute", "hour", "day", "week", "month", "quarter".
       * @example
       * // Returns "{0} days ago"
       * getRule(-2, "day")
       */

    }, {
      key: "getRule",
      value: function getRule(value, unit) {
        if (UNITS.indexOf(unit) < 0) {
          throw new RangeError("Unknown time unit: ".concat(unit, "."));
        } // Get locale-specific time interval formatting rules
        // of a given `style` for the given value of measurement `unit`.
        //
        // E.g.:
        //
        // ```json
        // {
        //  "past": {
        //    "one": "a second ago",
        //    "other": "{0} seconds ago"
        //  },
        //  "future": {
        //    "one": "in a second",
        //    "other": "in {0} seconds"
        //  }
        // }
        // ```
        //


        var unitRules = getLocaleData(this.locale)[this.style][unit]; // Special case for "yesterday"/"today"/"tomorrow".

        if (this.numeric === "auto") {
          // "yesterday", "the day before yesterday", etc.
          if (value === -2 || value === -1) {
            var message = unitRules["previous".concat(value === -1 ? '' : '-' + Math.abs(value))];

            if (message) {
              return message;
            }
          } // "tomorrow", "the day after tomorrow", etc.
          else if (value === 1 || value === 2) {
              var _message = unitRules["next".concat(value === 1 ? '' : '-' + Math.abs(value))];

              if (_message) {
                return _message;
              }
            } // "today"
            else if (value === 0) {
                if (unitRules.current) {
                  return unitRules.current;
                }
              }
        } // Choose either "past" or "future" based on time `value` sign.
        // If there's only "other" then it's being collapsed.
        // (the resulting bundle size optimization technique)


        var quantifierRules = unitRules[value <= 0 ? "past" : "future"]; // Bundle size optimization technique.

        if (typeof quantifierRules === "string") {
          return quantifierRules;
        } // Quantify `value`.


        var quantify = getLocaleData(this.locale).quantify;
        var quantifier = quantify && quantify(Math.abs(value)); // There seems to be no such locale in CLDR
        // for which `quantify` is missing
        // and still `past` and `future` messages
        // contain something other than "other".

        /* istanbul ignore next */

        quantifier = quantifier || 'other'; // "other" rule is supposed to be always present.
        // If only "other" rule is present then "rules" is not an object and is a string.

        return quantifierRules[quantifier] || quantifierRules.other;
      }
      /**
       * Formats a number into a string.
       * Uses `Intl.NumberFormat` when available.
       * @param  {number} number
       * @return {string}
       */

    }, {
      key: "formatNumber",
      value: function formatNumber(number) {
        return this.numberFormat ? this.numberFormat.format(number) : String(number);
      }
      /**
       * Returns a new object with properties reflecting the locale and date and time formatting options computed during initialization of this DateTimeFormat object.
       * https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/DateTimeFormat/resolvedOptions
       * @return {Object}
       */

    }, {
      key: "resolvedOptions",
      value: function resolvedOptions() {
        return {
          locale: this.locale,
          style: this.style,
          numeric: this.numeric
        };
      }
    }]);

    return RelativeTimeFormat;
  }();

  RelativeTimeFormat.supportedLocalesOf = function (locales) {
    var options = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {}; // Convert `locales` to an array.

    if (typeof locales === 'string') {
      locales = [locales];
    }

    return locales.filter(function (locale) {
      return resolveLocale(locale, options);
    });
  };
  /**
   * Adds locale data for a specific locale.
   * @param {Object} localeData
   */


  RelativeTimeFormat.addLocale = addLocaleData;
  /**
   * Sets default locale.
   * @param  {string} locale
   */

  RelativeTimeFormat.setDefaultLocale = setDefaultLocale;
  /**
   * Gets default locale.
   * @return  {string} locale
   */

  RelativeTimeFormat.getDefaultLocale = getDefaultLocale;
  /**
   * Extracts language from an IETF BCP 47 language tag.
   * @param {string} languageTag - IETF BCP 47 language tag.
   * @return {string}
   * @example
   * // Returns "he"
   * getLanguageFromLanguageTag("he-IL-u-ca-hebrew-tz-jeruslm")
   * // Returns "ar"
   * getLanguageFromLanguageTag("ar-u-nu-latn")
   */
  // export function getLanguageFromLanguageTag(languageTag) {
  //   const hyphenIndex = languageTag.indexOf('-')
  //   if (hyphenIndex > 0) {
  //     return languageTag.slice(0, hyphenIndex)
  //   }
  //   return languageTag
  // }

  function _typeof(obj) {
    if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") {
      _typeof = function _typeof(obj) {
        return typeof obj;
      };
    } else {
      _typeof = function _typeof(obj) {
        return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
      };
    }

    return _typeof(obj);
  }

  function _classCallCheck$1(instance, Constructor) {
    if (!(instance instanceof Constructor)) {
      throw new TypeError("Cannot call a class as a function");
    }
  }

  function _defineProperties$1(target, props) {
    for (var i = 0; i < props.length; i++) {
      var descriptor = props[i];
      descriptor.enumerable = descriptor.enumerable || false;
      descriptor.configurable = true;
      if ("value" in descriptor) descriptor.writable = true;
      Object.defineProperty(target, descriptor.key, descriptor);
    }
  }

  function _createClass$1(Constructor, protoProps, staticProps) {
    if (protoProps) _defineProperties$1(Constructor.prototype, protoProps);
    if (staticProps) _defineProperties$1(Constructor, staticProps);
    return Constructor;
  }

  function _defineProperty$1(obj, key, value) {
    if (key in obj) {
      Object.defineProperty(obj, key, {
        value: value,
        enumerable: true,
        configurable: true,
        writable: true
      });
    } else {
      obj[key] = value;
    }

    return obj;
  }
  /**
   * A basic in-memory cache.
   *
   * import Cache from 'javascript-time-ago/Cache'
   * const cache = new Cache()
   * const object = cache.get('key1', 'key2', ...) || cache.put('key1', 'key2', ..., createObject())
   */


  var Cache = /*#__PURE__*/function () {
    function Cache() {
      _classCallCheck$1(this, Cache);

      _defineProperty$1(this, "cache", {});
    }

    _createClass$1(Cache, [{
      key: "get",
      value: function get() {
        var cache = this.cache;

        for (var _len = arguments.length, keys = new Array(_len), _key = 0; _key < _len; _key++) {
          keys[_key] = arguments[_key];
        }

        for (var _i = 0; _i < keys.length; _i++) {
          var key = keys[_i];

          if (_typeof(cache) !== 'object') {
            return;
          }

          cache = cache[key];
        }

        return cache;
      }
    }, {
      key: "put",
      value: function put() {
        for (var _len2 = arguments.length, keys = new Array(_len2), _key2 = 0; _key2 < _len2; _key2++) {
          keys[_key2] = arguments[_key2];
        }

        var value = keys.pop();
        var lastKey = keys.pop();
        var cache = this.cache;

        for (var _i2 = 0; _i2 < keys.length; _i2++) {
          var key = keys[_i2];

          if (_typeof(cache[key]) !== 'object') {
            cache[key] = {};
          }

          cache = cache[key];
        }

        return cache[lastKey] = value;
      }
    }]);

    return Cache;
  }();

  var minute = 60; // in seconds

  var hour = 60 * minute; // in seconds

  var day = 24 * hour; // in seconds
  // https://www.quora.com/What-is-the-average-number-of-days-in-a-month

  var month = 30.44 * day; // in seconds
  // "400 years have 146097 days (taking into account leap year rules)"

  var year = 146097 / 400 * day; // in seconds

  /**
   * Returns a step of gradation corresponding to the unit.
   * @param  {Object[]} gradation
   * @param  {string} unit
   * @return {?Object}
   */

  function getStep(gradation, unit) {
    for (var _iterator = gradation, _isArray = Array.isArray(_iterator), _i = 0, _iterator = _isArray ? _iterator : _iterator[Symbol.iterator]();;) {
      var _ref;

      if (_isArray) {
        if (_i >= _iterator.length) break;
        _ref = _iterator[_i++];
      } else {
        _i = _iterator.next();
        if (_i.done) break;
        _ref = _i.value;
      }

      var step = _ref;

      if (step.unit === unit) {
        return step;
      }
    }
  }
  /**
   * Converts value to a `Date`
   * @param {(number|Date)} value
   * @return {Date}
   */

  function getDate(value) {
    return value instanceof Date ? value : new Date(value);
  }

  // 1 second ago
  // 2 seconds ago
  // …
  // 59 seconds ago
  // 1 minute ago
  // 2 minutes ago
  // …
  // 59 minutes ago
  // 1 hour ago
  // 2 hours ago
  // …
  // 24 hours ago
  // 1 day ago
  // 2 days ago
  // …
  // 7 days ago
  // 1 week ago
  // 2 weeks ago
  // …
  // 3 weeks ago
  // 1 month ago
  // 2 months ago
  // …
  // 11 months ago
  // 1 year ago
  // 2 years ago
  // …

  var canonical = [{
    factor: 1,
    unit: 'now'
  }, {
    threshold: 0.5,
    factor: 1,
    unit: 'second'
  }, {
    threshold: 59.5,
    factor: 60,
    unit: 'minute'
  }, {
    threshold: 59.5 * 60,
    factor: 60 * 60,
    unit: 'hour'
  }, {
    threshold: 23.5 * 60 * 60,
    factor: day,
    unit: 'day'
  }, {
    threshold: 6.5 * day,
    factor: 7 * day,
    unit: 'week'
  }, {
    threshold: 3.5 * 7 * day,
    factor: month,
    unit: 'month'
  }, {
    threshold: 11.5 * month,
    factor: year,
    unit: 'year'
  }];

  // 1 minute ago
  // 2 minutes ago
  // 5 minutes ago
  // 10 minutes ago
  // 15 minutes ago
  // 20 minutes ago
  // an hour ago
  // 2 hours ago
  // …
  // 20 hours ago
  // a day ago
  // 2 days ago
  // 5 days ago
  // a week ago
  // 2 weeks ago
  // 3 weeks ago
  // a month ago
  // 2 months ago
  // 4 months ago
  // a year ago
  // 2 years ago
  // …

  var convenient = [{
    factor: 1,
    unit: 'now'
  }, {
    threshold: 1,
    threshold_for_now: 45,
    factor: 1,
    unit: 'second'
  }, {
    threshold: 45,
    factor: 60,
    unit: 'minute'
  }, {
    threshold: 2.5 * 60,
    factor: 60,
    granularity: 5,
    unit: 'minute'
  }, {
    threshold: 22.5 * 60,
    factor: 30 * 60,
    unit: 'half-hour'
  }, {
    threshold: 42.5 * 60,
    threshold_for_minute: 52.5 * 60,
    factor: 60 * 60,
    unit: 'hour'
  }, {
    threshold: 20.5 / 24 * day,
    factor: day,
    unit: 'day'
  }, {
    threshold: 5.5 * day,
    factor: 7 * day,
    unit: 'week'
  }, {
    threshold: 3.5 * 7 * day,
    factor: month,
    unit: 'month'
  }, {
    threshold: 10.5 * month,
    factor: year,
    unit: 'year'
  }];

  function _typeof$1(obj) {
    if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") {
      _typeof$1 = function _typeof(obj) {
        return typeof obj;
      };
    } else {
      _typeof$1 = function _typeof(obj) {
        return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
      };
    }

    return _typeof$1(obj);
  }
  /**
   * Takes seconds `elapsed` and measures them against
   * `gradation` to return the suitable `gradation` step.
   *
   * @param {number} elapsed - Time interval (in seconds). Is < 0 for past dates and > 0 for future dates.
   *
   * @param {string[]} units - A list of allowed time units
   *                           (e.g. ['second', 'minute', 'hour', …])
   *
   * @param {Object} [gradation] - Time scale gradation steps.
   *
   *                               E.g.:
   *                               [
   *                                 { unit: 'second', factor: 1 },
   *                                 { unit: 'minute', factor: 60, threshold: 60 },
   *                                 { format(), threshold: 24 * 60 * 60 },
   *                                 …
   *                               ]
   *
   * @return {?Object} `gradation` step.
   */

  function grade(elapsed, now, units) {
    var gradation = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : convenient; // Leave only allowed time measurement units.
    // E.g. omit "quarter" unit.

    gradation = getAllowedSteps(gradation, units); // If no steps of gradation fit the conditions
    // then return nothing.

    if (gradation.length === 0) {
      return;
    } // Find the most appropriate gradation step


    var i = findGradationStep(elapsed, now, gradation);
    var step = gradation[i]; // If time elapsed is too small and even
    // the first gradation step doesn't suit it
    // then return nothing.

    if (i === -1) {
      return;
    } // Apply granularity to the time amount
    // (and fall back to the previous step
    //  if the first level of granularity
    //  isn't met by this amount)


    if (step.granularity) {
      // Recalculate the elapsed time amount based on granularity
      var amount = Math.round(Math.abs(elapsed) / step.factor / step.granularity) * step.granularity; // If the granularity for this step
      // is too high, then fallback
      // to the previous step of gradation.
      // (if there is any previous step of gradation)

      if (amount === 0 && i > 0) {
        return gradation[i - 1];
      }
    }

    return step;
  }
  /**
   * Gets threshold for moving from `fromStep` to `next_step`.
   * @param  {Object} fromStep - From step.
   * @param  {Object} next_step - To step.
   * @param  {number} now - The current timestamp.
   * @param  {boolean} future - Is `true` for future dates ("in 5 minutes").
   * @return {number}
   * @throws Will throw if no threshold is found.
   */

  function getThreshold(fromStep, toStep, now, future) {
    var threshold; // Allows custom thresholds when moving
    // from a specific step to a specific step.

    if (fromStep && (fromStep.id || fromStep.unit)) {
      threshold = toStep["threshold_for_".concat(fromStep.id || fromStep.unit)];
    } // If no custom threshold is set for this transition
    // then use the usual threshold for the next step.


    if (threshold === undefined) {
      threshold = toStep.threshold;
    } // Convert threshold to a number.


    if (typeof threshold === 'function') {
      threshold = threshold(now, future);
    } // Throw if no threshold is found.


    if (fromStep && typeof threshold !== 'number') {
      // Babel transforms `typeof` into some "branches"
      // so istanbul will show this as "branch not covered".

      /* istanbul ignore next */
      var type = _typeof$1(threshold);

      throw new Error("Each step of a gradation must have a threshold defined except for the first one. Got \"".concat(threshold, "\", ").concat(type, ". Step: ").concat(JSON.stringify(toStep)));
    }

    return threshold;
  }
  /**
   * @param  {number} elapsed - Time elapsed (in seconds).
   * @param  {number} now - Current timestamp.
   * @param  {Object} gradation - Gradation.
   * @param  {number} i - Gradation step currently being tested.
   * @return {number} Gradation step index.
   */


  function findGradationStep(elapsed, now, gradation) {
    var i = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : 0; // If the threshold for moving from previous step
    // to this step is too high then return the previous step.

    if (Math.abs(elapsed) < getThreshold(gradation[i - 1], gradation[i], now, elapsed < 0)) {
      return i - 1;
    } // If it's the last step of gradation then return it.


    if (i === gradation.length - 1) {
      return i;
    } // Move to the next step.


    return findGradationStep(elapsed, now, gradation, i + 1);
  }
  /**
   * Leaves only allowed gradation steps.
   * @param  {Object[]} gradation
   * @param  {string[]} units - Allowed time units.
   * @return {Object[]}
   */


  function getAllowedSteps(gradation, units) {
    return gradation.filter(function (_ref) {
      var unit = _ref.unit; // If this step has a `unit` defined
      // then this `unit` must be in the list of `units` allowed.

      if (unit) {
        return units.indexOf(unit) >= 0;
      } // A gradation step is not required to specify a `unit`.
      // E.g. for Twitter gradation it specifies `format()` instead.


      return true;
    });
  }

  function _typeof$2(obj) {
    if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") {
      _typeof$2 = function _typeof(obj) {
        return typeof obj;
      };
    } else {
      _typeof$2 = function _typeof(obj) {
        return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
      };
    }

    return _typeof$2(obj);
  } // Chooses the most appropriate locale
  // (one of the registered ones)
  // based on the list of preferred `locales` supplied by the user.
  //
  // @param {string[]} locales - the list of preferable locales (in [IETF format](https://en.wikipedia.org/wiki/IETF_language_tag)).
  // @param {Function} isLocaleDataAvailable - tests if a locale is available.
  //
  // @returns {string} The most suitable locale
  //
  // @example
  // // Returns 'en'
  // chooseLocale(['en-US'], undefined, (locale) => locale === 'ru' || locale === 'en')
  //


  function chooseLocale(locales, isLocaleDataAvailable) {
    // This is not an intelligent algorithm,
    // but it will do for this library's case.
    // `sr-Cyrl-BA` -> `sr-Cyrl` -> `sr`.
    for (var _iterator = locales, _isArray = Array.isArray(_iterator), _i = 0, _iterator = _isArray ? _iterator : _iterator[Symbol.iterator]();;) {
      var _ref;

      if (_isArray) {
        if (_i >= _iterator.length) break;
        _ref = _iterator[_i++];
      } else {
        _i = _iterator.next();
        if (_i.done) break;
        _ref = _i.value;
      }

      var locale = _ref;

      if (isLocaleDataAvailable(locale)) {
        return locale;
      }

      var parts = locale.split('-');

      while (parts.length > 1) {
        parts.pop();
        locale = parts.join('-');

        if (isLocaleDataAvailable(locale)) {
          return locale;
        }
      }
    }

    throw new Error("No locale data has been registered for any of the locales: ".concat(locales.join(', ')));
  }
  /**
   * Whether can use `Intl.DateTimeFormat`.
   * @return {boolean}
   */

  function intlDateTimeFormatSupported() {
    // Babel transforms `typeof` into some "branches"
    // so istanbul will show this as "branch not covered".

    /* istanbul ignore next */
    var isIntlAvailable = (typeof Intl === "undefined" ? "undefined" : _typeof$2(Intl)) === 'object';
    return isIntlAvailable && typeof Intl.DateTimeFormat === 'function';
  }

  //
  // just now
  // 5 minutes
  // 10 minutes
  // 15 minutes
  // 20 minutes
  // an hour
  // 2 hours
  // …
  // 20 hours
  // 1 day
  // 2 days
  // a week
  // 2 weeks
  // 3 weeks
  // a month
  // 2 months
  // 3 months
  // 4 months
  // a year
  // 2 years
  //

  var timeStyle = {
    gradation: convenient,
    flavour: 'long-time',
    units: ['now', 'minute', 'hour', 'day', 'week', 'month', 'year']
  };

  function _objectSpread(target) {
    for (var i = 1; i < arguments.length; i++) {
      var source = arguments[i] != null ? arguments[i] : {};
      var ownKeys = Object.keys(source);

      if (typeof Object.getOwnPropertySymbols === 'function') {
        ownKeys = ownKeys.concat(Object.getOwnPropertySymbols(source).filter(function (sym) {
          return Object.getOwnPropertyDescriptor(source, sym).enumerable;
        }));
      }

      ownKeys.forEach(function (key) {
        _defineProperty$2(target, key, source[key]);
      });
    }

    return target;
  }

  function _defineProperty$2(obj, key, value) {
    if (key in obj) {
      Object.defineProperty(obj, key, {
        value: value,
        enumerable: true,
        configurable: true,
        writable: true
      });
    } else {
      obj[key] = value;
    }

    return obj;
  }
  // for various locales (is a global variable).

  var formatters = {}; // Twitter style relative time formatting.
  // ("1m", "2h", "Mar 3", "Apr 4, 2012").
  // Seconds, minutes and hours are shown relatively,
  // and other intervals can be shown using full date format.

  var twitterStyle = {
    // Twitter gradation is derived from "canonical" gradation
    // adjusting its "minute" `threshold` to be 45.
    gradation: [// Minutes
    _objectSpread({}, getStep(canonical, 'minute'), {
      // Starts showing `1m` after `59s`.
      threshold: 59.5
    }), // Hours
    _objectSpread({}, getStep(canonical, 'hour'), {
      // After `59m` it will show `1h`.
      threshold: 59.5 * 60
    }), // If `date` and `now` happened the same year,
    // then only output month and day.
    {
      threshold: day - 0.5 * hour,
      format: function format(value, locale) {
        // Whether can use `Intl.DateTimeFormat`.
        // If `Intl` is not available,
        // or the locale is not supported,
        // then don't override the default labels.

        /* istanbul ignore if */
        if (!intlDateTimeFormatSupported()) {
          return;
        }
        /* istanbul ignore else */


        if (!formatters[locale]) {
          formatters[locale] = {};
        }
        /* istanbul ignore else */


        if (!formatters[locale].this_year) {
          // "Apr 11" (MMMd)
          formatters[locale].this_year = new Intl.DateTimeFormat(locale, {
            month: 'short',
            day: 'numeric'
          });
        } // Output month and day.


        return formatters[locale].this_year.format(getDate(value));
      }
    }, // If `date` and `now` happened in defferent years,
    // then output day, month and year.
    {
      threshold: function threshold(now, future) {
        if (future) {
          // Jan 1st 00:00 of the next year.
          var nextYear = new Date(new Date(now).getFullYear() + 1, 0);
          return (nextYear.getTime() - now) / 1000;
        } else {
          // Jan 1st of the current year.
          var thisYear = new Date(new Date(now).getFullYear(), 0);
          return (now - thisYear.getTime()) / 1000;
        }
      },
      format: function format(value, locale) {
        // Whether can use `Intl.DateTimeFormat`.
        // If `Intl` is not available,
        // or the locale is not supported,
        // then don't override the default labels.

        /* istanbul ignore if */
        if (!intlDateTimeFormatSupported()) {
          return;
        }
        /* istanbul ignore if */


        if (!formatters[locale]) {
          formatters[locale] = {};
        }
        /* istanbul ignore else */


        if (!formatters[locale].other) {
          // "Apr 11, 2017" (yMMMd)
          formatters[locale].other = new Intl.DateTimeFormat(locale, {
            year: 'numeric',
            month: 'short',
            day: 'numeric'
          });
        } // Output day, month and year.


        return formatters[locale].other.format(getDate(value));
      }
    }],
    flavour: ['tiny', 'short-time', 'narrow', 'short']
  };

  var defaultStyle = {
    gradation: convenient,
    flavour: ['long-convenient', 'long'],
    units: ['now', 'minute', 'hour', 'day', 'week', 'month', 'year']
  };

  // Fallback locale.
  // their relative time formatter messages will be stored here.

  var localesData$1 = {};
  function getLocaleData$1(locale) {
    return localesData$1[locale];
  }
  function addLocaleData$1(localeData) {
    if (!localeData) {
      throw new Error('[javascript-time-ago] No locale data passed.');
    } // This locale data is stored in a global variable
    // and later used when calling `.format(time)`.


    localesData$1[localeData.locale] = localeData;
  }

  function _typeof$3(obj) {
    if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") {
      _typeof$3 = function _typeof(obj) {
        return typeof obj;
      };
    } else {
      _typeof$3 = function _typeof(obj) {
        return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
      };
    }

    return _typeof$3(obj);
  }

  function _classCallCheck$2(instance, Constructor) {
    if (!(instance instanceof Constructor)) {
      throw new TypeError("Cannot call a class as a function");
    }
  }

  function _defineProperties$2(target, props) {
    for (var i = 0; i < props.length; i++) {
      var descriptor = props[i];
      descriptor.enumerable = descriptor.enumerable || false;
      descriptor.configurable = true;
      if ("value" in descriptor) descriptor.writable = true;
      Object.defineProperty(target, descriptor.key, descriptor);
    }
  }

  function _createClass$2(Constructor, protoProps, staticProps) {
    if (protoProps) _defineProperties$2(Constructor.prototype, protoProps);
    if (staticProps) _defineProperties$2(Constructor, staticProps);
    return Constructor;
  }

  var JavascriptTimeAgo = /*#__PURE__*/function () {
    /**
     * @param {(string|string[])} locales=[] - Preferred locales (or locale).
     */
    function JavascriptTimeAgo() {
      var locales = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : [];

      _classCallCheck$2(this, JavascriptTimeAgo); // Convert `locales` to an array.


      if (typeof locales === 'string') {
        locales = [locales];
      } // Choose the most appropriate locale
      // (one of the previously added ones)
      // based on the list of preferred `locales` supplied by the user.


      this.locale = chooseLocale(locales.concat(RelativeTimeFormat.getDefaultLocale()), getLocaleData$1); // Use `Intl.NumberFormat` for formatting numbers (when available).

      if (typeof Intl !== 'undefined' && Intl.NumberFormat) {
        this.numberFormat = new Intl.NumberFormat(this.locale);
      } // Cache `Intl.RelativeTimeFormat` instance.


      this.relativeTimeFormatCache = new Cache();
    } // Formats the relative date/time.
    //
    // @return {string} Returns the formatted relative date/time.
    //
    // @param {(Object|string)} [style] - Relative date/time formatting style.
    //
    // @param {string[]} [style.units] - A list of allowed time units
    //                                  (e.g. ['second', 'minute', 'hour', …])
    //
    // @param {Function} [style.custom] - `function ({ elapsed, time, date, now })`.
    //                                    If this function returns a value, then
    //                                    the `.format()` call will return that value.
    //                                    Otherwise it has no effect.
    //
    // @param {string} [style.flavour] - e.g. "long", "short", "tiny", etc.
    //
    // @param {Object[]} [style.gradation] - Time scale gradation steps.
    //
    // @param {string} style.gradation[].unit - Time interval measurement unit.
    //                                          (e.g. ['second', 'minute', 'hour', …])
    //
    // @param {Number} style.gradation[].factor - Time interval measurement unit factor.
    //                                            (e.g. `60` for 'minute')
    //
    // @param {Number} [style.gradation[].granularity] - A step for the unit's "amount" value.
    //                                                   (e.g. `5` for '0 minutes', '5 minutes', etc)
    //
    // @param {Number} [style.gradation[].threshold] - Time interval measurement unit threshold.
    //                                                 (e.g. `45` seconds for 'minute').
    //                                                 There can also be specific `threshold_[unit]`
    //                                                 thresholds for fine-tuning.
    //


    _createClass$2(JavascriptTimeAgo, [{
      key: "format",
      value: function format(input) {
        var style = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : defaultStyle;

        if (typeof style === 'string') {
          switch (style) {
            case 'twitter':
              style = twitterStyle;
              break;

            case 'time':
              style = timeStyle;
              break;

            default:
              style = defaultStyle;
          }
        }

        var _getDateAndTimeBeingF = getDateAndTimeBeingFormatted(input),
            date = _getDateAndTimeBeingF.date,
            time = _getDateAndTimeBeingF.time; // Get locale messages for this formatting flavour


        var _this$getLocaleData = this.getLocaleData(style.flavour),
            flavour = _this$getLocaleData.flavour,
            localeData = _this$getLocaleData.localeData; // Can pass a custom `now`, e.g. for testing purposes.
        // Technically it doesn't belong to `style`
        // but since this is an undocumented internal feature,
        // taking it from the `style` argument will do (for now).


        var now = style.now || Date.now(); // how much time elapsed (in seconds)

        var elapsed = (now - time) / 1000; // in seconds
        // `custom` – A function of `{ elapsed, time, date, now, locale }`.
        // If this function returns a value, then the `.format()` call will return that value.
        // Otherwise the relative date/time is formatted as usual.
        // This feature is currently not used anywhere and is here
        // just for providing the ultimate customization point
        // in case anyone would ever need that. Prefer using
        // `gradation[step].format(value, locale)` instead.
        //
        // I guess `custom` is deprecated and will be removed
        // in some future major version release.
        //

        if (style.custom) {
          var custom = style.custom({
            now: now,
            date: date,
            time: time,
            elapsed: elapsed,
            locale: this.locale
          });

          if (custom !== undefined) {
            return custom;
          }
        } // Available time interval measurement units.


        var units = getTimeIntervalMeasurementUnits(localeData, style.units); // If no available time unit is suitable, just output an empty string.

        if (units.length === 0) {
          console.error("Units \"".concat(units.join(', '), "\" were not found in locale data for \"").concat(this.locale, "\"."));
          return '';
        } // Choose the appropriate time measurement unit
        // and get the corresponding rounded time amount.


        var step = grade(elapsed, now, units, style.gradation); // If no time unit is suitable, just output an empty string.
        // E.g. when "now" unit is not available
        // and "second" has a threshold of `0.5`
        // (e.g. the "canonical" grading scale).

        if (!step) {
          return '';
        }

        if (step.format) {
          return step.format(date || time, this.locale);
        }

        var unit = step.unit,
            factor = step.factor,
            granularity = step.granularity;
        var amount = Math.abs(elapsed) / factor; // Apply granularity to the time amount
        // (and fallback to the previous step
        //  if the first level of granularity
        //  isn't met by this amount)

        if (granularity) {
          // Recalculate the elapsed time amount based on granularity
          amount = Math.round(amount / granularity) * granularity;
        } // `Intl.RelativeTimeFormat` doesn't operate in "now" units.


        if (unit === 'now') {
          return getNowMessage(localeData, -1 * Math.sign(elapsed));
        }

        switch (flavour) {
          case 'long':
          case 'short':
          case 'narrow':
            // Format `value` using `Intl.RelativeTimeFormat`.
            return this.getFormatter(flavour).format(-1 * Math.sign(elapsed) * Math.round(amount), unit);

          default:
            // Format `value`.
            // (mimicks `Intl.RelativeTimeFormat` with the addition of extra styles)
            return this.formatValue(-1 * Math.sign(elapsed) * Math.round(amount), unit, localeData);
        }
      }
      /**
       * Mimicks what `Intl.RelativeTimeFormat` does for additional locale styles.
       * @param  {number} value
       * @param  {string} unit
       * @param  {object} localeData — Relative time messages for the flavor.
       * @return {string}
       */

    }, {
      key: "formatValue",
      value: function formatValue(value, unit, localeData) {
        return this.getRule(value, unit, localeData).replace('{0}', this.formatNumber(Math.abs(value)));
      }
      /**
       * Returns formatting rule for `value` in `units` (either in past or in future).
       * @param {number} value - Time interval value.
       * @param {string} unit - Time interval measurement unit.
       * @param  {object} localeData — Relative time messages for the flavor.
       * @return {string}
       * @example
       * // Returns "{0} days ago"
       * getRule(-2, "day")
       */

    }, {
      key: "getRule",
      value: function getRule(value, unit, localeData) {
        var unitRules = localeData[unit]; // Bundle size optimization technique.

        if (typeof unitRules === 'string') {
          return unitRules;
        } // Choose either "past" or "future" based on time `value` sign.
        // If "past" is same as "future" then they're stored as "other".
        // If there's only "other" then it's being collapsed.


        var quantifierRules = unitRules[value <= 0 ? 'past' : 'future'] || unitRules; // Bundle size optimization technique.

        if (typeof quantifierRules === 'string') {
          return quantifierRules;
        } // Quantify `value`.


        var quantify = getLocaleData$1(this.locale).quantify;

        var quantifier = quantify && quantify(Math.abs(value)); // There seems to be no such locale in CLDR
        // for which `quantify` is missing
        // and still `past` and `future` messages
        // contain something other than "other".

        /* istanbul ignore next */

        quantifier = quantifier || 'other'; // "other" rule is supposed to always be present.
        // If only "other" rule is present then "rules" is not an object and is a string.

        return quantifierRules[quantifier] || quantifierRules.other;
      }
      /**
       * Formats a number into a string.
       * Uses `Intl.NumberFormat` when available.
       * @param  {number} number
       * @return {string}
       */

    }, {
      key: "formatNumber",
      value: function formatNumber(number) {
        return this.numberFormat ? this.numberFormat.format(number) : String(number);
      }
      /**
       * Returns an `Intl.RelativeTimeFormat` for a given `flavor`.
       * @param {string} flavor
       * @return {object} `Intl.RelativeTimeFormat` instance
       */

    }, {
      key: "getFormatter",
      value: function getFormatter(flavor) {
        // `Intl.RelativeTimeFormat` instance creation is assumed a
        // lengthy operation so the instances are cached and reused.
        return this.relativeTimeFormatCache.get(this.locale, flavor) || this.relativeTimeFormatCache.put(this.locale, flavor, new RelativeTimeFormat(this.locale, {
          style: flavor
        }));
      }
      /**
       * Gets locale messages for this formatting flavour
       *
       * @param {(string|string[])} flavour - Relative date/time formatting flavour.
       *                                      If it's an array then all flavours are tried in order.
       *
       * @returns {Object} Returns an object of shape { flavour, localeData }
       */

    }, {
      key: "getLocaleData",
      value: function getLocaleData() {
        var flavour = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : []; // Get relative time formatting rules for this locale

        var localeData = getLocaleData$1(this.locale); // Convert `flavour` to an array.


        if (typeof flavour === 'string') {
          flavour = [flavour];
        } // "long" flavour is the default one.
        // (it's always present)


        flavour = flavour.concat('long'); // Find a suitable flavour.

        for (var _iterator = flavour, _isArray = Array.isArray(_iterator), _i = 0, _iterator = _isArray ? _iterator : _iterator[Symbol.iterator]();;) {
          var _ref;

          if (_isArray) {
            if (_i >= _iterator.length) break;
            _ref = _iterator[_i++];
          } else {
            _i = _iterator.next();
            if (_i.done) break;
            _ref = _i.value;
          }

          var _ = _ref;

          if (localeData[_]) {
            return {
              flavour: _,
              localeData: localeData[_]
            };
          }
        } // Can't happen - "long" flavour is always present.
        // throw new Error(`None of the flavours - ${flavour.join(', ')} - was found for locale "${this.locale}".`)

      }
    }]);

    return JavascriptTimeAgo;
  }();
  JavascriptTimeAgo.getDefaultLocale = RelativeTimeFormat.getDefaultLocale;
  /**
   * Sets default locale.
   * @param  {string} locale
   */

  JavascriptTimeAgo.setDefaultLocale = RelativeTimeFormat.setDefaultLocale;
  /**
   * Adds locale data for a specific locale.
   * @param {Object} localeData
   */

  JavascriptTimeAgo.addLocale = function (localeData) {
    addLocaleData$1(localeData);
    RelativeTimeFormat.addLocale(localeData);
  };
  /**
   * (legacy alias)
   * Adds locale data for a specific locale.
   * @param {Object} localeData
   * @deprecated
   */


  JavascriptTimeAgo.locale = JavascriptTimeAgo.addLocale; // Normalizes `.format()` `time` argument.

  function getDateAndTimeBeingFormatted(input) {
    if (input.constructor === Date || isMockedDate(input)) {
      return {
        date: input,
        time: input.getTime()
      };
    }

    if (typeof input === 'number') {
      return {
        time: input // `date` is not required for formatting
        // relative times unless "twitter" preset is used.
        // date : new Date(input)

      };
    } // For some weird reason istanbul doesn't see this `throw` covered.

    /* istanbul ignore next */


    throw new Error("Unsupported relative time formatter input: ".concat(_typeof$3(input), ", ").concat(input));
  } // During testing via some testing libraries `Date`s aren't actually `Date`s.
  // https://github.com/catamphetamine/javascript-time-ago/issues/22


  function isMockedDate(object) {
    return _typeof$3(object) === 'object' && typeof object.getTime === 'function';
  } // Get available time interval measurement units.


  function getTimeIntervalMeasurementUnits(localeData, restrictedSetOfUnits) {
    // All available time interval measurement units.
    var units = Object.keys(localeData); // If only a specific set of available
    // time measurement units can be used.

    if (restrictedSetOfUnits) {
      // Reduce available time interval measurement units
      // based on user's preferences.
      units = restrictedSetOfUnits.filter(function (_) {
        return units.indexOf(_) >= 0;
      });
    } // Stock `Intl.RelativeTimeFormat` locale data doesn't have "now" units.
    // So either "now" is present in extended locale data
    // or it's taken from ".second.current".


    if ((!restrictedSetOfUnits || restrictedSetOfUnits.indexOf('now') >= 0) && units.indexOf('now') < 0) {
      if (localeData.second.current) {
        units.unshift('now');
      }
    }

    return units;
  }

  function getNowMessage(localeData, value) {
    // Specific "now" message form extended locale data (if present).
    if (localeData.now) {
      // Bundle size optimization technique.
      if (typeof localeData.now === 'string') {
        return localeData.now;
      } // Not handling `value === 0` as `localeData.now.current` here
      // because it wouldn't make sense: "now" is a moment,
      // so one can't possibly differentiate between a
      // "previous" moment, a "current" moment and a "next moment".
      // It can only be differentiated between "past" and "future".


      if (value <= 0) {
        return localeData.now.past;
      } else {
        return localeData.now.future;
      }
    } // Use ".second.current" as "now" message.


    return localeData.second.current; // If this function was called then
    // it means that either "now" unit messages are
    // available or ".second.current" message is present.
  }

  var year$1 = {
  	previous: "в прошлом году",
  	current: "в этом году",
  	next: "в следующем году",
  	past: {
  		one: "{0} год назад",
  		many: "{0} лет назад",
  		other: "{0} года назад"
  	},
  	future: {
  		one: "через {0} год",
  		many: "через {0} лет",
  		other: "через {0} года"
  	}
  };
  var quarter = {
  	previous: "в прошлом квартале",
  	current: "в текущем квартале",
  	next: "в следующем квартале",
  	past: {
  		one: "{0} квартал назад",
  		many: "{0} кварталов назад",
  		other: "{0} квартала назад"
  	},
  	future: {
  		one: "через {0} квартал",
  		many: "через {0} кварталов",
  		other: "через {0} квартала"
  	}
  };
  var month$1 = {
  	previous: "в прошлом месяце",
  	current: "в этом месяце",
  	next: "в следующем месяце",
  	past: {
  		one: "{0} месяц назад",
  		many: "{0} месяцев назад",
  		other: "{0} месяца назад"
  	},
  	future: {
  		one: "через {0} месяц",
  		many: "через {0} месяцев",
  		other: "через {0} месяца"
  	}
  };
  var week = {
  	previous: "на прошлой неделе",
  	current: "на этой неделе",
  	next: "на следующей неделе",
  	past: {
  		one: "{0} неделю назад",
  		many: "{0} недель назад",
  		other: "{0} недели назад"
  	},
  	future: {
  		one: "через {0} неделю",
  		many: "через {0} недель",
  		other: "через {0} недели"
  	}
  };
  var day$1 = {
  	previous: "вчера",
  	"previous-2": "позавчера",
  	current: "сегодня",
  	next: "завтра",
  	"next-2": "послезавтра",
  	past: {
  		one: "{0} день назад",
  		many: "{0} дней назад",
  		other: "{0} дня назад"
  	},
  	future: {
  		one: "через {0} день",
  		many: "через {0} дней",
  		other: "через {0} дня"
  	}
  };
  var hour$1 = {
  	current: "в этот час",
  	past: {
  		one: "{0} час назад",
  		many: "{0} часов назад",
  		other: "{0} часа назад"
  	},
  	future: {
  		one: "через {0} час",
  		many: "через {0} часов",
  		other: "через {0} часа"
  	}
  };
  var minute$1 = {
  	current: "в эту минуту",
  	past: {
  		one: "{0} минуту назад",
  		many: "{0} минут назад",
  		other: "{0} минуты назад"
  	},
  	future: {
  		one: "через {0} минуту",
  		many: "через {0} минут",
  		other: "через {0} минуты"
  	}
  };
  var second = {
  	current: "сейчас",
  	past: {
  		one: "{0} секунду назад",
  		many: "{0} секунд назад",
  		other: "{0} секунды назад"
  	},
  	future: {
  		one: "через {0} секунду",
  		many: "через {0} секунд",
  		other: "через {0} секунды"
  	}
  };
  var long = {
  	year: year$1,
  	quarter: quarter,
  	month: month$1,
  	week: week,
  	day: day$1,
  	hour: hour$1,
  	minute: minute$1,
  	second: second
  };

  var long$1 = /*#__PURE__*/Object.freeze({
    __proto__: null,
    year: year$1,
    quarter: quarter,
    month: month$1,
    week: week,
    day: day$1,
    hour: hour$1,
    minute: minute$1,
    second: second,
    'default': long
  });

  var year$2 = {
  	previous: "в прошлом г.",
  	current: "в этом г.",
  	next: "в след. г.",
  	past: {
  		many: "{0} л. назад",
  		other: "{0} г. назад"
  	},
  	future: {
  		many: "через {0} л.",
  		other: "через {0} г."
  	}
  };
  var quarter$1 = {
  	previous: "последний кв.",
  	current: "текущий кв.",
  	next: "следующий кв.",
  	past: "{0} кв. назад",
  	future: "через {0} кв."
  };
  var month$2 = {
  	previous: "в прошлом мес.",
  	current: "в этом мес.",
  	next: "в следующем мес.",
  	past: "{0} мес. назад",
  	future: "через {0} мес."
  };
  var week$1 = {
  	previous: "на прошлой нед.",
  	current: "на этой нед.",
  	next: "на следующей нед.",
  	past: "{0} нед. назад",
  	future: "через {0} нед."
  };
  var day$2 = {
  	previous: "вчера",
  	"previous-2": "позавчера",
  	current: "сегодня",
  	next: "завтра",
  	"next-2": "послезавтра",
  	past: "{0} дн. назад",
  	future: "через {0} дн."
  };
  var hour$2 = {
  	current: "в этот час",
  	past: {
  		one: "{0} ч. назад",
  		other: "{0} ч. назад"
  	},
  	future: {
  		one: "через {0} ч.",
  		other: "через {0} ч."
  	}
  };
  var minute$2 = {
  	current: "в эту минуту",
  	past: "{0} мин. назад",
  	future: "через {0} мин."
  };
  var second$1 = {
  	current: "сейчас",
  	past: "{0} сек. назад",
  	future: "через {0} сек."
  };
  var short = {
  	year: year$2,
  	quarter: quarter$1,
  	month: month$2,
  	week: week$1,
  	day: day$2,
  	hour: hour$2,
  	minute: minute$2,
  	second: second$1
  };

  var short$1 = /*#__PURE__*/Object.freeze({
    __proto__: null,
    year: year$2,
    quarter: quarter$1,
    month: month$2,
    week: week$1,
    day: day$2,
    hour: hour$2,
    minute: minute$2,
    second: second$1,
    'default': short
  });

  var year$3 = {
  	previous: "в пр. г.",
  	current: "в эт. г.",
  	next: "в сл. г.",
  	past: {
  		many: "-{0} л.",
  		other: "-{0} г."
  	},
  	future: {
  		many: "+{0} л.",
  		other: "+{0} г."
  	}
  };
  var quarter$2 = {
  	previous: "посл. кв.",
  	current: "тек. кв.",
  	next: "след. кв.",
  	past: "-{0} кв.",
  	future: "+{0} кв."
  };
  var month$3 = {
  	previous: "в пр. мес.",
  	current: "в эт. мес.",
  	next: "в след. мес.",
  	past: "-{0} мес.",
  	future: "+{0} мес."
  };
  var week$2 = {
  	previous: "на пр. нед.",
  	current: "на эт. нед.",
  	next: "на след. неделе",
  	past: "-{0} нед.",
  	future: "+{0} нед."
  };
  var day$3 = {
  	previous: "вчера",
  	"previous-2": "позавчера",
  	current: "сегодня",
  	next: "завтра",
  	"next-2": "послезавтра",
  	past: "-{0} дн.",
  	future: "+{0} дн."
  };
  var hour$3 = {
  	current: "в этот час",
  	past: "-{0} ч.",
  	future: "+{0} ч."
  };
  var minute$3 = {
  	current: "в эту минуту",
  	past: "-{0} мин.",
  	future: "+{0} мин."
  };
  var second$2 = {
  	current: "сейчас",
  	past: "-{0} с",
  	future: "+{0} с"
  };
  var narrow = {
  	year: year$3,
  	quarter: quarter$2,
  	month: month$3,
  	week: week$2,
  	day: day$3,
  	hour: hour$3,
  	minute: minute$3,
  	second: second$2
  };

  var narrow$1 = /*#__PURE__*/Object.freeze({
    __proto__: null,
    year: year$3,
    quarter: quarter$2,
    month: month$3,
    week: week$2,
    day: day$3,
    hour: hour$3,
    minute: minute$3,
    second: second$2,
    'default': narrow
  });

  var quantify = function (e) {
    var i = String(e).split("."),
        n = i[0],
        r = !i[1],
        s = n.slice(-1),
        t = n.slice(-2);
    return r && 1 == s && 11 != t ? "one" : r && 2 <= s && s <= 4 && (t < 12 || 14 < t) ? "few" : r && 0 == s || r && 5 <= s && s <= 9 || r && 11 <= t && t <= 14 ? "many" : "other";
  };

  function getCjsExportFromNamespace (n) {
  	return n && n['default'] || n;
  }

  var require$$0 = getCjsExportFromNamespace(long$1);

  var require$$1 = getCjsExportFromNamespace(short$1);

  var require$$2 = getCjsExportFromNamespace(narrow$1);

  var ru = {
    locale: 'ru',
    long: require$$0,
    short: require$$1,
    narrow: require$$2,
    quantify: quantify
  };

  var year$4 = {
  	many: "{0} л.",
  	other: "{0} г."
  };
  var month$4 = "{0} мес.";
  var week$3 = "{0} нед.";
  var day$4 = {
  	one: "{0} д.",
  	other: "{0} дн."
  };
  var hour$4 = "{0} ч.";
  var minute$4 = "{0} мин.";
  var second$3 = "{0} сек.";
  var now = {
  	past: "только что",
  	future: "сейчас"
  };
  var shortTime = {
  	year: year$4,
  	month: month$4,
  	week: week$3,
  	day: day$4,
  	hour: hour$4,
  	minute: minute$4,
  	second: second$3,
  	now: now
  };

  var shortTime$1 = /*#__PURE__*/Object.freeze({
    __proto__: null,
    year: year$4,
    month: month$4,
    week: week$3,
    day: day$4,
    hour: hour$4,
    minute: minute$4,
    second: second$3,
    now: now,
    'default': shortTime
  });

  var year$5 = {
  	previous: "в прошлом г.",
  	current: "в этом г.",
  	next: "в след. г.",
  	past: {
  		many: "{0} л. назад",
  		other: "{0} г. назад"
  	},
  	future: {
  		many: "через {0} л.",
  		other: "через {0} г."
  	}
  };
  var quarter$3 = {
  	previous: "последний кв.",
  	current: "текущий кв.",
  	next: "следующий кв.",
  	past: "{0} кв. назад",
  	future: "через {0} кв."
  };
  var month$5 = {
  	previous: "в прошлом мес.",
  	current: "в этом мес.",
  	next: "в следующем мес.",
  	past: "{0} мес. назад",
  	future: "через {0} мес."
  };
  var week$4 = {
  	previous: "на прошлой нед.",
  	current: "на этой нед.",
  	next: "на следующей нед.",
  	past: "{0} нед. назад",
  	future: "через {0} нед."
  };
  var day$5 = {
  	previous: "вчера",
  	current: "сегодня",
  	next: "завтра",
  	past: "{0} дн. назад",
  	future: "через {0} дн."
  };
  var hour$5 = {
  	current: "в этот час",
  	past: {
  		one: "{0} ч. назад",
  		other: "{0} ч. назад"
  	},
  	future: {
  		one: "через {0} ч.",
  		other: "через {0} ч."
  	}
  };
  var minute$5 = {
  	current: "в эту минуту",
  	past: "{0} мин. назад",
  	future: "через {0} мин."
  };
  var second$4 = {
  	current: "сейчас",
  	past: "{0} сек. назад",
  	future: "через {0} сек."
  };
  var now$1 = {
  	past: "только что",
  	future: "сейчас"
  };
  var shortConvenient = {
  	year: year$5,
  	quarter: quarter$3,
  	month: month$5,
  	week: week$4,
  	day: day$5,
  	hour: hour$5,
  	minute: minute$5,
  	second: second$4,
  	now: now$1
  };

  var shortConvenient$1 = /*#__PURE__*/Object.freeze({
    __proto__: null,
    year: year$5,
    quarter: quarter$3,
    month: month$5,
    week: week$4,
    day: day$5,
    hour: hour$5,
    minute: minute$5,
    second: second$4,
    now: now$1,
    'default': shortConvenient
  });

  var year$6 = {
  	one: "{0} год",
  	many: "{0} лет",
  	other: "{0} года"
  };
  var month$6 = {
  	one: "{0} месяц",
  	many: "{0} месяцев",
  	other: "{0} месяца"
  };
  var week$5 = {
  	one: "{0} неделю",
  	many: "{0} недель",
  	other: "{0} недели"
  };
  var day$6 = {
  	one: "{0} день",
  	few: "{0} дня",
  	other: "{0} дней"
  };
  var hour$6 = {
  	one: "{0} час",
  	many: "{0} часов",
  	other: "{0} часа"
  };
  var minute$6 = {
  	one: "{0} минута",
  	many: "{0} минут",
  	other: "{0} минуты"
  };
  var second$5 = {
  	one: "{0} секунда",
  	many: "{0} секунд",
  	other: "{0} секунды"
  };
  var now$2 = {
  	past: "только что",
  	future: "сейчас"
  };
  var longTime = {
  	year: year$6,
  	month: month$6,
  	week: week$5,
  	day: day$6,
  	hour: hour$6,
  	minute: minute$6,
  	second: second$5,
  	now: now$2
  };

  var longTime$1 = /*#__PURE__*/Object.freeze({
    __proto__: null,
    year: year$6,
    month: month$6,
    week: week$5,
    day: day$6,
    hour: hour$6,
    minute: minute$6,
    second: second$5,
    now: now$2,
    'default': longTime
  });

  var year$7 = {
  	previous: "в прошлом году",
  	current: "в этом году",
  	next: "в следующем году",
  	past: {
  		one: "{0} год назад",
  		many: "{0} лет назад",
  		other: "{0} года назад"
  	},
  	future: {
  		one: "через {0} год",
  		many: "через {0} лет",
  		other: "через {0} года"
  	}
  };
  var quarter$4 = {
  	previous: "в прошлом квартале",
  	current: "в текущем квартале",
  	next: "в следующем квартале",
  	past: {
  		one: "{0} квартал назад",
  		many: "{0} кварталов назад",
  		other: "{0} квартала назад"
  	},
  	future: {
  		one: "через {0} квартал",
  		many: "через {0} кварталов",
  		other: "через {0} квартала"
  	}
  };
  var month$7 = {
  	previous: "в прошлом месяце",
  	current: "в этом месяце",
  	next: "в следующем месяце",
  	past: {
  		one: "{0} месяц назад",
  		many: "{0} месяцев назад",
  		other: "{0} месяца назад"
  	},
  	future: {
  		one: "через {0} месяц",
  		many: "через {0} месяцев",
  		other: "через {0} месяца"
  	}
  };
  var week$6 = {
  	previous: "на прошлой неделе",
  	current: "на этой неделе",
  	next: "на следующей неделе",
  	past: {
  		one: "Неделю назад",
  		many: "{0} недель назад",
  		other: "{0} недели назад"
  	},
  	future: {
  		one: "через {0} неделю",
  		many: "через {0} недель",
  		other: "через {0} недели"
  	}
  };
  var day$7 = {
  	previous: "вчера",
  	current: "сегодня",
  	next: "завтра",
  	past: {
  		one: "{0} день назад",
  		many: "{0} дней назад",
  		other: "{0} дня назад"
  	},
  	future: {
  		one: "через {0} день",
  		many: "через {0} дней",
  		other: "через {0} дня"
  	}
  };
  var hour$7 = {
  	current: "в этот час",
  	past: {
  		one: "{0} час назад",
  		many: "{0} часов назад",
  		other: "{0} часа назад"
  	},
  	future: {
  		one: "через {0} час",
  		many: "через {0} часов",
  		other: "через {0} часа"
  	}
  };
  var minute$7 = {
  	current: "в эту минуту",
  	past: {
  		one: "{0} минуту назад",
  		many: "{0} минут назад",
  		other: "{0} минуты назад"
  	},
  	future: {
  		one: "через {0} минуту",
  		many: "через {0} минут",
  		other: "через {0} минуты"
  	}
  };
  var second$6 = {
  	current: "сейчас",
  	past: {
  		one: "{0} секунду назад",
  		many: "{0} секунд назад",
  		other: "{0} секунды назад"
  	},
  	future: {
  		one: "через {0} секунду",
  		many: "через {0} секунд",
  		other: "через {0} секунды"
  	}
  };
  var now$3 = {
  	past: "только что",
  	future: "сейчас"
  };
  var longConvenient = {
  	year: year$7,
  	quarter: quarter$4,
  	month: month$7,
  	week: week$6,
  	day: day$7,
  	hour: hour$7,
  	minute: minute$7,
  	second: second$6,
  	now: now$3
  };

  var longConvenient$1 = /*#__PURE__*/Object.freeze({
    __proto__: null,
    year: year$7,
    quarter: quarter$4,
    month: month$7,
    week: week$6,
    day: day$7,
    hour: hour$7,
    minute: minute$7,
    second: second$6,
    now: now$3,
    'default': longConvenient
  });

  var year$8 = {
  	many: "{0} л",
  	other: "{0} г"
  };
  var month$8 = "{0} мес";
  var week$7 = "{0} нед";
  var day$8 = "{0} д";
  var hour$8 = "{0} ч";
  var minute$8 = "{0} мин";
  var second$7 = "{0} с";
  var tiny = {
  	year: year$8,
  	month: month$8,
  	week: week$7,
  	day: day$8,
  	hour: hour$8,
  	minute: minute$8,
  	second: second$7
  };

  var tiny$1 = /*#__PURE__*/Object.freeze({
    __proto__: null,
    year: year$8,
    month: month$8,
    week: week$7,
    day: day$8,
    hour: hour$8,
    minute: minute$8,
    second: second$7,
    'default': tiny
  });

  var require$$0$1 = getCjsExportFromNamespace(shortTime$1);

  var require$$1$1 = getCjsExportFromNamespace(shortConvenient$1);

  var require$$2$1 = getCjsExportFromNamespace(longTime$1);

  var require$$3 = getCjsExportFromNamespace(longConvenient$1);

  var require$$4 = getCjsExportFromNamespace(tiny$1);

  var ru$1 = {
    locale: ru.locale,
    // Standard styles.
    long: ru.long,
    short: ru.short,
    narrow: ru.narrow,
    // Additional styles.
    'short-time': require$$0$1,
    'short-convenient': require$$1$1,
    'long-time': require$$2$1,
    'long-convenient': require$$3,
    'tiny': require$$4,
    // Quantifier.
    quantify: ru.quantify
  };

  JavascriptTimeAgo.addLocale(ru$1);
  const timeAgo = new JavascriptTimeAgo('ru-RU');
  document.querySelectorAll("time.published").forEach(function (el) {
    el.innerHTML = timeAgo.format(new Date(el.getAttribute("datetime")));
  });
  var wallPostAddPhoto = document.querySelector(".wall-post-add-photo");

  if (wallPostAddPhoto) {
    wallPostAddPhoto.addEventListener("click", function (e) {
      e.preventDefault();
      this.previousElementSibling.click();
    });
  }

  document.addEventListener("click", function (e) {
    e.path.forEach(function (el) {
      if (el.classList && el.classList.contains('like-wall-post')) {
        e.preventDefault();

        if (document.querySelector('[data-user-id]')) {
          let span = el.querySelector("span");

          if (!el.classList.contains('liked')) {
            if (span.innerHTML == "") {
              span.innerHTML = 1;
            } else {
              let likes = parseInt(span.innerHTML);
              likes++;
              span.innerHTML = likes;
            }

            el.classList.add("liked");
          } else {
            let likes = parseInt(span.innerHTML);
            likes--;

            if (likes == 0) {
              span.innerHTML = "";
            } else {
              span.innerHTML = likes;
            }

            el.classList.remove("liked");
          }

          var xhr = new XMLHttpRequest();
          xhr.open('POST', el.getAttribute("href") + "?_token=" + document.querySelector("[name='_token']").value);

          xhr.onload = function () {
            if (xhr.status === 200) {
              console.log(xhr.responseText);
            }
          };

          xhr.send();
        } else {
          openPopup("#notLoggedInPopup");
        }
      }
    });
  });
  document.addEventListener("submit", function (e) {
    e.path.forEach(function (el) {
      if (el.id && el.getAttribute("id") == "newsfeed-items-grid-form") {
        e.preventDefault();
        var formData = new FormData(el);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', el.getAttribute("action"));

        xhr.onload = function () {
          if (xhr.status === 200) {
            var data = JSON.parse(xhr.responseText);
            console.log(data);
            let newsfeedItemsGreed = document.querySelector("#newsfeed-items-grid");
            let post = document.createElement("div");
            post.classList.add("ui-block");
            post.innerHTML = `<article class="hentry post">
    					<div class="post__author author vcard inline-items">
    						<img src="` + document.querySelector(".author-thumb img").getAttribute("src") + `" alt="author">
    				
    						<div class="author-date">
    							<a class="h6 post__author-name fn" href="` + document.querySelector(".author-name").getAttribute("href") + `">` + document.querySelector(".author-name").innerHTML + `</a>
    							<div class="post__date">
    								<time class="published" datetime="2020-03-24T18:18">
    									Только что
    								</time>
    							</div>
    						</div>
    				
    						<div class="more">
    							<svg class="olymp-three-dots-icon">
    								<use xlink:href="#olymp-three-dots-icon"></use>
    							</svg>
    							<ul class="more-dropdown">
    								<li>
    									<a href="#">Редактировать сообщение</a>
    								</li>
    								<li>
    									<a href="#">Удалить сообщение</a>
    								</li>
    							</ul>
    						</div>
    				
    					</div>
    				
    					<p>` + data.text + `</p>
    				
    					<div class="post-additional-info inline-items">
    				
    						<a href="#" class="post-add-icon inline-items like-wall-post">
    							<svg class="olymp-heart-icon">
    								<use xlink:href="#olymp-heart-icon"></use>
    							</svg>
    							<span>0</span>
    						</a>
    						<div class="comments-shared">
    							<a href="#" class="post-add-icon inline-items">
    								<svg class="olymp-speech-balloon-icon">
    									<use xlink:href="#olymp-speech-balloon-icon"></use>
    								</svg>
    								<span>0</span>
    							</a>
    				
    							<a href="#" class="post-add-icon inline-items">
    								<svg class="olymp-share-icon">
    									<use xlink:href="#olymp-share-icon"></use>
    								</svg>
    								<span>0</span>
    							</a>
    						</div>
    					</div>
    				</article>`;
            document.querySelector("#newsfeed-items-grid>div:first-child").after(post);
            var noWallPosts = document.querySelector(".no-wall-posts");

            if (noWallPosts) {
              noWallPosts.remove();
            }
          } else {
            console.log('Request failed.  Returned status of ' + xhr.status);
          }
        };

        xhr.send(formData);
      }
    });
  });

})));
