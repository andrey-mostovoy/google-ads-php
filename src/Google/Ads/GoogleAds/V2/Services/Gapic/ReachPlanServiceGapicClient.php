<?php
/*
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/*
 * GENERATED CODE WARNING
 * This file was generated from the file
 * https://github.com/google/googleapis/blob/master/google/ads/googleads/v2/services/reach_plan_service.proto
 * and updates to that file get reflected here through a refresh process.
 *
 * @experimental
 */

namespace Google\Ads\GoogleAds\V2\Services\Gapic;

use Google\Ads\GoogleAds\V2\Services\CampaignDuration;
use Google\Ads\GoogleAds\V2\Services\GenerateProductMixIdeasRequest;
use Google\Ads\GoogleAds\V2\Services\GenerateProductMixIdeasResponse;
use Google\Ads\GoogleAds\V2\Services\GenerateReachForecastRequest;
use Google\Ads\GoogleAds\V2\Services\GenerateReachForecastResponse;
use Google\Ads\GoogleAds\V2\Services\ListPlannableLocationsRequest;
use Google\Ads\GoogleAds\V2\Services\ListPlannableLocationsResponse;
use Google\Ads\GoogleAds\V2\Services\ListPlannableProductsRequest;
use Google\Ads\GoogleAds\V2\Services\ListPlannableProductsResponse;
use Google\Ads\GoogleAds\V2\Services\PlannedProduct;
use Google\Ads\GoogleAds\V2\Services\Preferences;
use Google\Ads\GoogleAds\V2\Services\Targeting;
use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\RequestParamsHeaderDescriptor;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Google\Protobuf\Int32Value;
use Google\Protobuf\Int64Value;
use Google\Protobuf\StringValue;

/**
 * Service Description: Reach Plan Service gives users information about audience size that can
 * be reached through advertisement on YouTube. In particular,
 * GenerateReachForecast provides estimated number of people of specified
 * demographics that can be reached by an ad in a given market by a campaign of
 * certain duration with a defined budget.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $reachPlanServiceClient = new ReachPlanServiceClient();
 * try {
 *     $response = $reachPlanServiceClient->listPlannableLocations();
 * } finally {
 *     $reachPlanServiceClient->close();
 * }
 * ```
 *
 * @experimental
 */
class ReachPlanServiceGapicClient
{
    use GapicClientTrait;

    /**
     * The name of the service.
     */
    const SERVICE_NAME = 'google.ads.googleads.v2.services.ReachPlanService';

    /**
     * The default address of the service.
     */
    const SERVICE_ADDRESS = 'googleads.googleapis.com';

    /**
     * The default port of the service.
     */
    const DEFAULT_SERVICE_PORT = 443;

    /**
     * The name of the code generator, to be included in the agent header.
     */
    const CODEGEN_NAME = 'gapic';

    /**
     * The default scopes required by the service.
     */
    public static $serviceScopes = [
    ];

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'serviceAddress' => self::SERVICE_ADDRESS.':'.self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__.'/../resources/reach_plan_service_client_config.json',
            'descriptorsConfigPath' => __DIR__.'/../resources/reach_plan_service_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__.'/../resources/reach_plan_service_grpc_config.json',
            'credentialsConfig' => [
                'scopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__.'/../resources/reach_plan_service_rest_client_config.php',
                ],
            ],
        ];
    }

    /**
     * Constructor.
     *
     * @param array $options {
     *                       Optional. Options for configuring the service API wrapper.
     *
     *     @type string $serviceAddress
     *           The address of the API remote host. May optionally include the port, formatted
     *           as "<uri>:<port>". Default 'googleads.googleapis.com:443'.
     *     @type string|array|FetchAuthTokenInterface|CredentialsWrapper $credentials
     *           The credentials to be used by the client to authorize API calls. This option
     *           accepts either a path to a credentials file, or a decoded credentials file as a
     *           PHP array.
     *           *Advanced usage*: In addition, this option can also accept a pre-constructed
     *           {@see \Google\Auth\FetchAuthTokenInterface} object or
     *           {@see \Google\ApiCore\CredentialsWrapper} object. Note that when one of these
     *           objects are provided, any settings in $credentialsConfig will be ignored.
     *     @type array $credentialsConfig
     *           Options used to configure credentials, including auth token caching, for the client.
     *           For a full list of supporting configuration options, see
     *           {@see \Google\ApiCore\CredentialsWrapper::build()}.
     *     @type bool $disableRetries
     *           Determines whether or not retries defined by the client configuration should be
     *           disabled. Defaults to `false`.
     *     @type string|array $clientConfig
     *           Client method configuration, including retry settings. This option can be either a
     *           path to a JSON file, or a PHP array containing the decoded JSON data.
     *           By default this settings points to the default client config file, which is provided
     *           in the resources folder.
     *     @type string|TransportInterface $transport
     *           The transport used for executing network requests. May be either the string `rest`
     *           or `grpc`. Defaults to `grpc` if gRPC support is detected on the system.
     *           *Advanced usage*: Additionally, it is possible to pass in an already instantiated
     *           {@see \Google\ApiCore\Transport\TransportInterface} object. Note that when this
     *           object is provided, any settings in $transportConfig, and any $serviceAddress
     *           setting, will be ignored.
     *     @type array $transportConfig
     *           Configuration options that will be used to construct the transport. Options for
     *           each supported transport type should be passed in a key for that transport. For
     *           example:
     *           $transportConfig = [
     *               'grpc' => [...],
     *               'rest' => [...]
     *           ];
     *           See the {@see \Google\ApiCore\Transport\GrpcTransport::build()} and
     *           {@see \Google\ApiCore\Transport\RestTransport::build()} methods for the
     *           supported options.
     * }
     *
     * @throws ValidationException
     * @experimental
     */
    public function __construct(array $options = [])
    {
        $clientOptions = $this->buildClientOptions($options);
        $this->setClientOptions($clientOptions);
    }

    /**
     * Returns the list of plannable locations (e.g. countries, DMAs).
     *
     * Sample code:
     * ```
     * $reachPlanServiceClient = new ReachPlanServiceClient();
     * try {
     *     $response = $reachPlanServiceClient->listPlannableLocations();
     * } finally {
     *     $reachPlanServiceClient->close();
     * }
     * ```
     *
     * @param array $optionalArgs {
     *                            Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Ads\GoogleAds\V2\Services\ListPlannableLocationsResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function listPlannableLocations(array $optionalArgs = [])
    {
        $request = new ListPlannableLocationsRequest();

        return $this->startCall(
            'ListPlannableLocations',
            ListPlannableLocationsResponse::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Returns the list of per-location plannable YouTube ad formats with allowed
     * targeting.
     *
     * Sample code:
     * ```
     * $reachPlanServiceClient = new ReachPlanServiceClient();
     * try {
     *     $plannableLocationId = new StringValue();
     *     $response = $reachPlanServiceClient->listPlannableProducts($plannableLocationId);
     * } finally {
     *     $reachPlanServiceClient->close();
     * }
     * ```
     *
     * @param StringValue $plannableLocationId The ID of the selected location for planning. To list the available
     *                                         plannable location ids use ListPlannableLocations.
     * @param array       $optionalArgs        {
     *                                         Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Ads\GoogleAds\V2\Services\ListPlannableProductsResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function listPlannableProducts($plannableLocationId, array $optionalArgs = [])
    {
        $request = new ListPlannableProductsRequest();
        $request->setPlannableLocationId($plannableLocationId);

        return $this->startCall(
            'ListPlannableProducts',
            ListPlannableProductsResponse::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Generates a product mix ideas given a set of preferences. This method
     * helps the advertiser to obtain a good mix of ad formats and budget
     * allocations based on its preferences.
     *
     * Sample code:
     * ```
     * $reachPlanServiceClient = new ReachPlanServiceClient();
     * try {
     *     $customerId = '';
     *     $plannableLocationId = new StringValue();
     *     $currencyCode = new StringValue();
     *     $budgetMicros = new Int64Value();
     *     $preferences = new Preferences();
     *     $response = $reachPlanServiceClient->generateProductMixIdeas($customerId, $plannableLocationId, $currencyCode, $budgetMicros, $preferences);
     * } finally {
     *     $reachPlanServiceClient->close();
     * }
     * ```
     *
     * @param string      $customerId          The ID of the customer.
     * @param StringValue $plannableLocationId Required. The ID of the location, this is one of the ids returned by
     *                                         ListPlannableLocations.
     * @param StringValue $currencyCode        Required. Currency code.
     *                                         Three-character ISO 4217 currency code.
     * @param Int64Value  $budgetMicros        Required. Total budget.
     *                                         Amount in micros. One million is equivalent to one unit.
     * @param Preferences $preferences         The preferences of the suggested product mix.
     *                                         An unset preference is interpreted as all possible values are allowed,
     *                                         unless explicitly specified.
     * @param array       $optionalArgs        {
     *                                         Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Ads\GoogleAds\V2\Services\GenerateProductMixIdeasResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function generateProductMixIdeas($customerId, $plannableLocationId, $currencyCode, $budgetMicros, $preferences, array $optionalArgs = [])
    {
        $request = new GenerateProductMixIdeasRequest();
        $request->setCustomerId($customerId);
        $request->setPlannableLocationId($plannableLocationId);
        $request->setCurrencyCode($currencyCode);
        $request->setBudgetMicros($budgetMicros);
        $request->setPreferences($preferences);

        $requestParams = new RequestParamsHeaderDescriptor([
          'customer_id' => $request->getCustomerId(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'GenerateProductMixIdeas',
            GenerateProductMixIdeasResponse::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Generates a reach forecast for a given targeting / product mix.
     *
     * Sample code:
     * ```
     * $reachPlanServiceClient = new ReachPlanServiceClient();
     * try {
     *     $customerId = '';
     *     $currencyCode = new StringValue();
     *     $campaignDuration = new CampaignDuration();
     *     $cookieFrequencyCap = new Int32Value();
     *     $minEffectiveFrequency = new Int32Value();
     *     $targeting = new Targeting();
     *     $plannedProducts = [];
     *     $response = $reachPlanServiceClient->generateReachForecast($customerId, $currencyCode, $campaignDuration, $cookieFrequencyCap, $minEffectiveFrequency, $targeting, $plannedProducts);
     * } finally {
     *     $reachPlanServiceClient->close();
     * }
     * ```
     *
     * @param string           $customerId            The ID of the customer.
     * @param StringValue      $currencyCode          Required. The currency code.
     *                                                Three-character ISO 4217 currency code.
     * @param CampaignDuration $campaignDuration      Campaign duration.
     * @param Int32Value       $cookieFrequencyCap    Desired cookie frequency cap that will be applied to each planned product.
     *                                                This is equivalent to the frequency cap exposed in Google Ads when creating
     *                                                a campaign, it represents the maximum number of times an ad can be shown to
     *                                                the same user.
     *                                                If not specified no cap is applied.
     * @param Int32Value       $minEffectiveFrequency Desired minimum effective frequency (the number of times a person was
     *                                                exposed to the ad) for the reported reach metrics [1-10].
     *                                                This won't affect the targeting, but just the reporting.
     *                                                If not specified, a default of 1 is applied.
     * @param Targeting        $targeting             The targeting to be applied to all products selected in the product mix.
     *
     * This is planned targeting: execution details might vary based on the
     * advertising product, please consult an implementation specialist.
     *
     * If no targeting dimensions are specified, then campaigns will target
     * everywhere and everyone.
     *
     * See specific metrics for details on how targeting affects them.
     *
     * In some cases, targeting may be overridden using the
     * PlannedProduct.advanced_product_targeting field.
     * @param PlannedProduct[] $plannedProducts The product to be planned.
     * @param array            $optionalArgs    {
     *                                          Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Ads\GoogleAds\V2\Services\GenerateReachForecastResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function generateReachForecast($customerId, $currencyCode, $campaignDuration, $cookieFrequencyCap, $minEffectiveFrequency, $targeting, $plannedProducts, array $optionalArgs = [])
    {
        $request = new GenerateReachForecastRequest();
        $request->setCustomerId($customerId);
        $request->setCurrencyCode($currencyCode);
        $request->setCampaignDuration($campaignDuration);
        $request->setCookieFrequencyCap($cookieFrequencyCap);
        $request->setMinEffectiveFrequency($minEffectiveFrequency);
        $request->setTargeting($targeting);
        $request->setPlannedProducts($plannedProducts);

        $requestParams = new RequestParamsHeaderDescriptor([
          'customer_id' => $request->getCustomerId(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'GenerateReachForecast',
            GenerateReachForecastResponse::class,
            $optionalArgs,
            $request
        )->wait();
    }
}
