<?php

declare(strict_types=1);

namespace SDK\Services;

use SDK\Core\Builders\BatchRequestBuilder;
use SDK\Core\Builders\RequestBuilder;
use SDK\Core\Dtos\ElementCollection;
use SDK\Core\Enums\Resource;
use SDK\Core\Services\Service;
use SDK\Core\Services\ServiceTrait;
use SDK\Core\Registry;
use SDK\Core\Resources\BatchRequests;
use SDK\Dtos\Basket\Basket;
use SDK\Dtos\Documents\DeliveryNote;
use SDK\Dtos\Documents\Transactions\Returns\RMA;
use SDK\Dtos\Documents\Transactions\Returns\ReturnDTO;
use SDK\Dtos\Documents\Transactions\Returns\CreditNote;
use SDK\Dtos\Documents\Transactions\Purchases\Invoice;
use SDK\Dtos\Documents\Transactions\Purchases\Order;
use SDK\Dtos\Documents\PDFDocument;
use SDK\Dtos\PaymentValidationResponse;
use SDK\Dtos\PayResponse;
use SDK\Services\Parameters\Groups\Document\ValidatePaymentParametersGroup;
use SDK\Dtos\Catalog\PhysicalLocation;
use SDK\Dtos\Documents\Rows\TransactionDocumentSingleRow;
use SDK\Services\Parameters\Groups\Document\CreateReturnRequestParametersGroup;
use SDK\Services\Parameters\Groups\PaginableParametersGroup;
use SDK\Dtos\Documents\PickupPointProvider;
use SDK\Dtos\Documents\Rich\RichCreditNote;
use SDK\Dtos\Documents\Rich\RichDeliveryNote;
use SDK\Dtos\Documents\Rich\RichInvoice;
use SDK\Dtos\Documents\Rich\RichOrder;
use SDK\Dtos\Documents\Rich\RichReturn;
use SDK\Dtos\Documents\Rich\RichRMA;
use SDK\Dtos\Documents\Transactions\Returns\RMAReason;
use SDK\Services\Parameters\Groups\Document\PickupPointProvidersParametersGroup;
use SDK\Services\Parameters\Groups\Document\RMAReasonsParametersGroup;

/**
 * This is the order service class.
 * This class will retrieve the orders and their documents from LogiCommerce API and transform them to objects.
 * All the needed banner operations previous to Framework must be done here.
 *
 * @see OrderService::getDeliveryNote()
 * @see OrderService::getReturnRequest()
 * @see OrderService::getReturnPoints()
 * @see OrderService::getPDFDeliveryNote()
 * @see OrderService::getOrderDeliveryNotes()
 * @see OrderService::getInvoice()
 * @see OrderService::getPDFInvoice()
 * @see OrderService::getPickupPointProviders()
 * @see OrderService::getOrderInvoices()
 * @see OrderService::createReturnRequest()
 * @see OrderService::getOrderRMAs()
 * @see OrderService::getRMA()
 * @see OrderService::getRMAPDF()
 * @see OrderService::getRMAReasons()
 * @see OrderService::getRMAReturns()
 * @see OrderService::getRMAReturnsPDF()
 * @see OrderService::getRMACorrectiveInvoice()
 * @see OrderService::getRMACorrectiveInvoicePDF()
 * @see OrderService::getCorrectiveInvoice()
 * @see OrderService::getOrderCorrectiveInvoices()
 * @see OrderService::getOrder()
 * @see OrderService::getPDFOrder()
 * @see OrderService::createOrder()
 * @see OrderService::redirectToPayment()
 * @see OrderService::validatePayment()
 * @see OrderService::recovery()
 * @see OrderService::recoveryBasket()
 * @see OrderService::getRichOrder()
 * @see OrderService::getRichInvoice()
 * @see OrderService::getRichDeliveryNote()
 * @see OrderService::getRichRMA()
 * @see OrderService::getRichReturn()
 * @see OrderService::getRichCorrectiveInvoice()
 * @see Document
 * @see DocumentNote
 *
 * @see OrderService::addGetDeliveryNote()
 * @see OrderService::addGetReturnProducts()
 * @see OrderService::addGetReturnPoints()
 * @see OrderService::addGetPDFDeliveryNote()
 * @see OrderService::addGetOrderDeliveryNotes()
 * @see OrderService::addGetInvoice()
 * @see OrderService::addGetPDFInvoice()
 * @see OrderService::addGetPickupPointProviders()
 * @see OrderService::addGetOrderInvoices()
 * @see OrderService::addGetOrderRMAs()
 * @see OrderService::addGetRMA()
 * @see OrderService::addGetRMAPDF()
 * @see OrderService::addGetRMAReasons()
 * @see OrderService::addGetRMAReturns()
 * @see OrderService::addGetRMAReturnsPDF()
 * @see OrderService::addGetRMACorrectiveInvoice()
 * @see OrderService::addGetRMACorrectiveInvoicePDF()
 * @see OrderService::addGetCorrectiveInvoice()
 * @see OrderService::addGetOrderCorrectiveInvoices()
 * @see OrderService::addGetOrder()
 * @see OrderService::addGetPDFOrder()
 * @see OrderService::addGetRichOrder()
 * @see OrderService::addGetRichInvoice()
 * @see OrderService::addGetRichDeliveryNote()
 * @see OrderService::addGetRichRMA()
 * @see OrderService::addGetRichReturn()
 * @see OrderService::addGetRichCorrectiveInvoice()
 * @see BatchRequests
 *
 * @see Service
 *
 * @uses ServiceTrait
 * @see ServiceTrait
 *
 * @package SDK\Services
 */
class OrderService extends Service {
    use ServiceTrait;

    private const REGISTRY_KEY = Registry::ORDER_MODEL;

    private const TOKEN = 'token';

    /**
     * Returns the delivery note identified by the given id
     *
     * @param int $id
     *
     * @return DeliveryNote|NULL
     */
    public function getDeliveryNote(int $id): ?DeliveryNote {
        return $this->getElement(DeliveryNote::class, Resource::DELIVERY_NOTES_ID, $id);
    }

    /**
     * Returns the returnable products identified by the given order id
     *
     * @param int $id
     *
     * @return ElementCollection|NULL
     */
    public function getReturnRequest(int $id): ?ElementCollection {
        return $this->getElements(TransactionDocumentSingleRow::class, $this->replaceWildcards(Resource::OMS_ORDER_ID_RMA_REQUEST, ['id' => $id]));
    }

    /**
     * Returns the return points identified by the given order id
     *
     * @param int $id
     * @param PaginableParametersGroup $params
     *
     * @return ElementCollection|NULL
     */
    public function getReturnPoints(int $id, PaginableParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(PhysicalLocation::class, $this->replaceWildcards(Resource::OMS_ORDER_ID_RMA_RETURNPOINTS, ['id' => $id]), $params);
    }

    /**
     * Returns the delivery note identified by the given id in PDF format (Base64)
     *
     * @param int $id
     *
     * @return PDFDocument|NULL
     */
    public function getPDFDeliveryNote(int $id): ?PDFDocument {
        return $this->getElement(PDFDocument::class, Resource::DELIVERY_NOTES_ID_PDF, $id);
    }

    /**
     * Returns the delivery notes filtered with the given order id
     *
     * @param int $id
     *            The id of the order we want to get the delivery notes
     *
     * @return ElementCollection|NULL
     */
    public function getOrderDeliveryNotes(int $id): ?ElementCollection {
        return $this->getElements(DeliveryNote::class, $this->replaceWildcards(Resource::ORDERS_ID_DELIVERY_NOTES, ['id' => $id]));
    }

    /**
     * Returns the invoice identified by the given id
     *
     * @param int $id
     *
     * @return Invoice|NULL
     */
    public function getInvoice(int $id): ?Invoice {
        return $this->getElement(Invoice::class, Resource::INVOICES_ID, $id);
    }

    /**
     * Returns the invoice identified by the given id in PDF format (Base64)
     *
     * @param int $id
     *
     * @return PDFDocument|NULL
     */
    public function getPDFInvoice(int $id): ?PDFDocument {
        return $this->getElement(PDFDocument::class, Resource::INVOICES_ID_PDF, $id);
    }

    /**
     * Returns the pickup point providers
     *
     * @param PickupPointProvidersParametersGroup $params
     *            object with the needed data to send to the API resource
     *
     * @return ElementCollection|NULL
     */
    public function getPickupPointProviders(PickupPointProvidersParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(PickupPointProvider::class, Resource::OMS_PICKUP_POINT_PROVIDERS, $params);
    }

    /**
     * Returns the invoices filtered with the given order id
     *
     * @param int $id
     *            The id of the order we want to get the invoices
     *
     * @return ElementCollection|NULL
     */
    public function getOrderInvoices(int $id): ?ElementCollection {
        return $this->getElements(Invoice::class, $this->replaceWildcards(Resource::ORDERS_ID_INVOICES, ['id' => $id]));
    }

    /**
     * Returns the Order RMAs identified by the given order id
     *
     * @param int $id
     *
     * @return ElementCollection|NULL
     */
    public function getOrderRMAs(int $id): ?ElementCollection {
        return $this->getElement(RMA::class, Resource::ORDERS_ID_RMAS, $id);
    }

    /**
     * Returns the rma identified by the given id
     *
     * @param int $id
     *
     * @return RMA|NULL
     */
    public function getRMA(int $id): ?RMA {
        return $this->getElement(RMA::class, Resource::OMS_RMAS_ID, $id);
    }

    /**
     * Returns the rma identified by the given id in PDF format (Base64)
     *
     * @param int $id
     *
     * @return PDFDocument|NULL
     */
    public function getRMAPDF(int $id): ?PDFDocument {
        return $this->getElement(PDFDocument::class, Resource::OMS_RMAS_ID_PDF, $id);
    }

    /**
     * Returns the rma return identified by the given id
     *
     * @param RMAReasonsParametersGroup $params
     *
     * @return ElementCollection|NULL
     */
    public function getRMAReasons(RMAReasonsParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(RMAReason::class, Resource::OMS_RMAS_REASONS, $params);
    }

    /**
     * Returns the rma return identified by the given id
     *
     * @param int $id
     *
     * @return ReturnDTO|NULL
     */
    public function getRMAReturns(int $id): ?ReturnDTO {
        return $this->getElement(ReturnDTO::class, Resource::OMS_RMAS_RETURN_ID, $id);
    }

    /**
     * Returns the rma return identified by the given id in PDF format (Base64)
     *
     * @param int $id
     *
     * @return PDFDocument|NULL
     */
    public function getRMAReturnsPDF(int $id): ?PDFDocument {
        return $this->getElement(PDFDocument::class, Resource::OMS_RMAS_RETURN_ID_PDF, $id);
    }

    /**
     * Returns the rma corrective invoice identified by the given id
     *
     * @param int $id
     *
     * @return CreditNote|NULL
     */
    public function getRMACorrectiveInvoice(int $id): ?CreditNote {
        return $this->getElement(CreditNote::class, Resource::OMS_RMAS_CREDITNOTE_ID, $id);
    }

    /**
     * Returns the rma corrective invoice identified by the given id in PDF format (Base64)
     *
     * @param int $id
     *
     * @return PDFDocument|NULL
     */
    public function getRMACorrectiveInvoicePDF(int $id): ?PDFDocument {
        return $this->getElement(PDFDocument::class, Resource::OMS_RMAS_CREDITNOTE_ID_PDF, $id);
    }

    /**
     * Returns the return requests filtered with the given order id
     *
     * @param int $id
     *            The id of the order we want to create the return requests
     * @param CreateReturnRequestParametersGroup $params
     *            object with the needed data to send to the API basket resource
     *
     * @return ElementCollection|NULL
     */
    public function createReturnRequest(int $id, CreateReturnRequestParametersGroup $params = null): ?RMA {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())
                    ->path(Resource::ORDERS_ID_RMA)->method(self::POST)->pathParams(['id' => $id])->body($params)
                    ->build()
            ),
            RMA::class
        );
    }

    /**
     * Returns the order identified by the given id
     *
     * @param int $id
     * @param string $token
     *
     * @return Order|NULL
     */
    public function getOrder(int $id, string $token = ''): ?Order {
        $resource = Resource::ORDERS_ID;
        if (strlen($token) !== 0) {
            $resource = $this->replaceWildcards(Resource::ORDERS_ID_TOKEN, [self::TOKEN => $token]);
        }
        return $this->getElement(Order::class, $resource, $id);
    }

    /**
     * Returns the order identified by the given id in PDF format (Base64)
     *
     * @param int $id
     * @param string $token
     *
     * @return PDFDocument|NULL
     */
    public function getPDFOrder(int $id, string $token = ''): ?PDFDocument {
        $resource = Resource::ORDERS_ID_PDF;
        if (strlen($token) !== 0) {
            $resource = $this->replaceWildcards(Resource::ORDERS_ID_TOKEN_PDF, [self::TOKEN => $token]);
        }
        return $this->getElement(PDFDocument::class, $resource, $id);
    }

    /**
     * Create an order through the current basket and returns it
     *
     * @return Order|NULL
     */
    public function createOrder(): ?Order {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path(Resource::ORDERS)->method(self::POST)->build()),
            Order::class
        );
    }

    /**
     * Return the needed payment information to redirect the user to the payment system or manage the navigation to the needed page
     *
     * @param int $id
     *            the internal identifier of the order we want to pay
     *
     * @return PayResponse|NULL
     */
    public function redirectToPayment(int $id): ?PayResponse {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path(Resource::ORDERS_ID_PAY)->method(self::POST)->pathParams(['id' => $id])->build()
            ),
            PayResponse::class
        );
    }

    /**
     * Validate the payment of an order. Returns the payment status
     *
     * @param ValidatePaymentParametersGroup|null $validatePaymentParametersGroup If no set, will be created from $_GET + $_POST
     * 
     * @return PaymentValidationResponse|NULL
     */
    public function validatePayment(?ValidatePaymentParametersGroup $validatePaymentParametersGroup = null): ?PaymentValidationResponse {
        if (is_null($validatePaymentParametersGroup)) {
            $validatePaymentParametersGroup = $this->getValidatePaymentParameters();
        }
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())
                    ->path(Resource::ORDERS_VALIDATE)->method(self::POST)->body($validatePaymentParametersGroup)
                    ->build()
            ),
            PaymentValidationResponse::class
        );
    }

    /**
     * Returns the basket adding the items inside the order identified by the given id
     *
     * @param int $id
     *
     * @return Basket|NULL
     */
    public function recovery(int $id): ?Basket {
        return $this->getElement(Basket::class, Resource::ORDERS_ID_RECOVERY, $id);
    }

    /**
     * Returns the basket adding the items inside the basket identified by the given hash
     *
     * @param string $hash
     *
     * @return Basket|NULL
     * @deprecated 2404-002
     */
    public function recoveryBasket(string $hash): ?Basket {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path(Resource::ORDERS_BASKET_RECOVERY)->method(self::GET)->urlParams(['hash' => $hash])->build()
            ),
            Basket::class
        );
    }

    /**
     * Returns the order in rich document format identified by the given id
     *
     * @param int $id
     *
     * @return RichOrder|NULL
     */
    public function getRichOrder(int $id): ?RichOrder {
        return $this->getElement(RichOrder::class, Resource::ORDERS_ID_RICH, $id);
    }

    /**
     * Returns the invoice in rich document format identified by the given id
     *
     * @param int $id
     *
     * @return RichInvoice|NULL
     */
    public function getRichInvoice(int $id): ?RichInvoice {
        return $this->getElement(RichInvoice::class, Resource::INVOICES_ID_RICH, $id);
    }

    /**
     * Returns the delivery note in rich document format identified by the given id
     *
     * @param int $id
     *
     * @return RichDeliveryNote|NULL
     */
    public function getRichDeliveryNote(int $id): ?RichDeliveryNote {
        return $this->getElement(RichDeliveryNote::class, Resource::DELIVERY_NOTES_ID_RICH, $id);
    }

    /**
     * Returns the rma in rich document format identified by the given id
     *
     * @param int $id
     *
     * @return RichRMA|NULL
     */
    public function getRichRMA(int $id): ?RichRMA {
        return $this->getElement(RichRMA::class, Resource::OMS_RMAS_ID_RICH, $id);
    }

    /**
     * Returns the return in rich document format identified by the given id
     *
     * @param int $id
     *
     * @return RichReturn|NULL
     */
    public function getRichReturn(int $id): ?RichReturn {
        return $this->getElement(RichReturn::class, Resource::OMS_RMAS_RETURN_ID_RICH, $id);
    }

    /**
     * Returns the corrective invoice in rich document format identified by the given id
     *
     * @param int $id
     *
     * @return RichCreditNote|NULL
     */
    public function getRichCorrectiveInvoice(int $id): ?RichCreditNote {
        return $this->getElement(RichCreditNote::class, Resource::OMS_RMAS_CREDITNOTE_ID_RICH, $id);
    }

    /**
     * Add the request to get returnable products filtered with the given parameters
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     *
     * @return void
     */
    public function addGetReturnProducts(BatchRequests $batchRequests, string $batchName, int $id): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::OMS_ORDER_ID_RMA_REQUEST)->pathParams(['id' => $id])->build()
        );
    }

    /**
     * Add the request to get the return points filtered with the given parameters
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     *
     * @return void
     */
    public function addGetReturnPoints(BatchRequests $batchRequests, string $batchName, int $id, PaginableParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::OMS_ORDER_ID_RMA_RETURNPOINTS)->pathParams(['id' => $id])->urlParams($params)->build()
        );
    }

    /**
     * Add the request to get the documents filtered with the given parameters
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     *
     * @return void
     */
    public function addGetDeliveryNote(BatchRequests $batchRequests, string $batchName, int $id): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::DELIVERY_NOTES_ID)->pathParams(['id' => $id])->build()
        );
    }

    /**
     * Add the request to get the delivery note identified by the given id in PDF format (Base64)
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     *
     * @return void
     */
    public function addGetPDFDeliveryNote(BatchRequests $batchRequests, string $batchName, int $id): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::DELIVERY_NOTES_ID_PDF)->pathParams(['id' => $id])->build()
        );
    }

    /**
     * Add the request to get the available PickupPointProvider
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param PickupPointProviderParametersGroup $params
     *            object with the needed data to send to the API resource
     *
     * @return void
     */
    public function addGetPickupPointProviders(BatchRequests $batchRequests, string $batchName, PickupPointProvidersParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::OMS_PICKUP_POINT_PROVIDERS)->urlParams($params)->build()
        );
    }

    /**
     * Add the request to get the delivery notes filtered with the given order id
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     *            The id of the order we want to get the delivery notes
     *
     * @return void
     */
    public function addGetOrderDeliveryNotes(BatchRequests $batchRequests, string $batchName, int $id): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::ORDERS_ID_DELIVERY_NOTES)->pathParams(['id' => $id])->build()
        );
    }

    /**
     * Add the request to get the invoice identified by the given id
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     *
     * @return void
     */
    public function addGetInvoice(BatchRequests $batchRequests, string $batchName, int $id): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::INVOICES_ID)->pathParams(['id' => $id])->build()
        );
    }

    /**
     * Add the request to get the invoice identified by the given id in PDF format (Base64)
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     *
     * @return void
     */
    public function addGetPDFInvoice(BatchRequests $batchRequests, string $batchName, int $id): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::INVOICES_ID_PDF)->pathParams(['id' => $id])->build()
        );
    }

    /**
     * Add the request to get the invoices filtered with the given order id
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     *            The id of the order we want to get the invoices
     *
     * @return void
     */
    public function addGetOrderInvoices(BatchRequests $batchRequests, string $batchName, int $id): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::ORDERS_ID_INVOICES)->pathParams(['id' => $id])->build()
        );
    }

    /**
     * Add the request to get the order RMAs identified by the given order id
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     *
     * @return void
     */
    public function addGetOrderRMAs(BatchRequests $batchRequests, string $batchName, int $id): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::ORDERS_ID_RMAS)->pathParams(['id' => $id])->build()
        );
    }

    /**
     * Add the request to get the rma identified by the given id
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     *
     * @return void
     */
    public function addGetRMA(BatchRequests $batchRequests, string $batchName, int $id): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::OMS_RMAS_ID)->pathParams(['id' => $id])->build()
        );
    }

    /**
     * Add the request to get the rma identified by the given id in PDF format (Base64)
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     *
     * @return void
     */
    public function addGetRMAPDF(BatchRequests $batchRequests, string $batchName, int $id): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::OMS_RMAS_ID_PDF)->pathParams(['id' => $id])->build()
        );
    }

    /**
     * Add the request to get the rma reasons
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param RMAReasonsParametersGroup $params
     *
     * @return void
     */
    public function addGetRMAReasons(BatchRequests $batchRequests, string $batchName, RMAReasonsParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::OMS_RMAS_REASONS)->urlParams($params)->build()
        );
    }

    /**
     * Add the request to get the rma return identified by the given id
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     *
     * @return void
     */
    public function addGetRMAReturns(BatchRequests $batchRequests, string $batchName, int $id): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::OMS_RMAS_RETURN_ID)->pathParams(['id' => $id])->build()
        );
    }

    /**
     * Add the request to get the rma return identified by the given id in PDF format (Base64)
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     *
     * @return void
     */
    public function addGetRMAReturnsPDF(BatchRequests $batchRequests, string $batchName, int $id): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::OMS_RMAS_RETURN_ID_PDF)->pathParams(['id' => $id])->build()
        );
    }

    /**
     * Add the request to get the rma corrective invoice identified by the given id
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     *
     * @return void
     */
    public function addGetRMACorrectiveInvoice(BatchRequests $batchRequests, string $batchName, int $id): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::OMS_RMAS_CREDITNOTE_ID)->pathParams(['id' => $id])->build()
        );
    }

    /**
     * Add the request to get the rma corrective invoice by the given id in PDF format (Base64)
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     *
     * @return void
     */
    public function addGetRMACorrectiveInvoicePDF(BatchRequests $batchRequests, string $batchName, int $id): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::OMS_RMAS_CREDITNOTE_ID_PDF)->pathParams(['id' => $id])->build()
        );
    }

    /**
     * Add the request to get the order identified by the given id
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     * @param string $token
     *
     * @return void
     */
    public function addGetOrder(BatchRequests $batchRequests, string $batchName, int $id, string $token = ''): void {
        $resource = Resource::ORDERS_ID;
        $params = ['id' => $id];        
        if (strlen($token) !== 0) {
            $resource = Resource::ORDERS_ID_TOKEN;
            $params[self::TOKEN] = $token;
        }
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path($resource)->pathParams($params)->build()
        );
    }

    /**
     * Add the request to get the order identified by the given id in PDF format (Base64)
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     * @param string $token
     *
     * @return void
     */
    public function addGetPDFOrder(BatchRequests $batchRequests, string $batchName, int $id, string $token = ''): void {
        $resource = Resource::ORDERS_ID_PDF;
        $params = ['id' => $id];
        if (strlen($token) !== 0) {
            $resource = Resource::ORDERS_ID_TOKEN_PDF;
            $params[self::TOKEN] = $token;
        }
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path($resource)->pathParams($params)->build()
        );
    }

    private function getValidatePaymentParameters(): ValidatePaymentParametersGroup {
        $validatePaymentParametersGroup = new ValidatePaymentParametersGroup();
        $validatePaymentParametersGroup->setParams($_GET + $_POST);
        $jsonBody = file_get_contents('php://input');
        $body = json_decode($jsonBody, true);
        if (!is_null($body)) {
            $simplifiedBody = [];
            foreach ($body as $key => $value) {
                $simplifiedBody[$key] = is_array($value) || is_object($value) ? json_encode($value) : $value;
            }
            $validatePaymentParametersGroup->setBody($jsonBody);
            $validatePaymentParametersGroup->setParams($_GET + $_POST + $simplifiedBody);
        }
        return $validatePaymentParametersGroup;
    }

    /**
     * Add the request to get the basket adding the items inside the order identified by the given id
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     *
     * @return void
     */
    public function addRecovery(BatchRequests $batchRequests, string $batchName, int $id): ?Basket {
        return $this->getElement(Basket::class, Resource::ORDERS_ID_RECOVERY, $id);
    }

    /**
     * Add the request to get the order in rich document format identified by the given id
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     *
     * @return void
     */
    public function addGetRichOrder(BatchRequests $batchRequests, string $batchName, int $id): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::ORDERS_ID_RICH)->pathParams(['id' => $id])->build()
        );
    }

    /**
     * Add the request to get the invoice in rich document format identified by the given id
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     *
     * @return void
     */
    public function addGetRichInvoice(BatchRequests $batchRequests, string $batchName, int $id): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::INVOICES_ID_RICH)->pathParams(['id' => $id])->build()
        );
    }

    /**
     * Add the request to get the delivery note in rich document format identified by the given id
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     *
     * @return void
     */
    public function addGetRichDeliveryNote(BatchRequests $batchRequests, string $batchName, int $id): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::DELIVERY_NOTES_ID_RICH)->pathParams(['id' => $id])->build()
        );
    }

    /**
     * Add the request to get the RMA in rich document format identified by the given id
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     *
     * @return void
     */
    public function addGetRichRMA(BatchRequests $batchRequests, string $batchName, int $id): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::OMS_RMAS_ID_RICH)->pathParams(['id' => $id])->build()
        );
    }

    /**
     * Add the request to get the return in rich document format identified by the given id
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     *
     * @return void
     */
    public function addGetRichReturn(BatchRequests $batchRequests, string $batchName, int $id): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::OMS_RMAS_RETURN_ID_RICH)->pathParams(['id' => $id])->build()
        );
    }

    /**
     * Add the request to get the corrective invoice in rich document format identified by the given id
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     *
     * @return void
     */
    public function addGetRichCorrectiveInvoice(BatchRequests $batchRequests, string $batchName, int $id): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::OMS_RMAS_CREDITNOTE_ID_RICH)->pathParams(['id' => $id])->build()
        );
    }
}
