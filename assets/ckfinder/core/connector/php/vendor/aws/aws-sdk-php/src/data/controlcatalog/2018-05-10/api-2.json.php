<?php
// This file was auto-generated from sdk-root/src/data/controlcatalog/2018-05-10/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2018-05-10', 'endpointPrefix' => 'controlcatalog', 'jsonVersion' => '1.1', 'protocol' => 'rest-json', 'serviceFullName' => 'AWS Control Catalog', 'serviceId' => 'ControlCatalog', 'signatureVersion' => 'v4', 'signingName' => 'controlcatalog', 'uid' => 'controlcatalog-2018-05-10', ], 'operations' => [ 'ListCommonControls' => [ 'name' => 'ListCommonControls', 'http' => [ 'method' => 'POST', 'requestUri' => '/common-controls', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListCommonControlsRequest', ], 'output' => [ 'shape' => 'ListCommonControlsResponse', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'ListDomains' => [ 'name' => 'ListDomains', 'http' => [ 'method' => 'POST', 'requestUri' => '/domains', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListDomainsRequest', ], 'output' => [ 'shape' => 'ListDomainsResponse', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'ListObjectives' => [ 'name' => 'ListObjectives', 'http' => [ 'method' => 'POST', 'requestUri' => '/objectives', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListObjectivesRequest', ], 'output' => [ 'shape' => 'ListObjectivesResponse', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ThrottlingException', ], ], ], ], 'shapes' => [ 'AccessDeniedException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 403, 'senderFault' => true, ], 'exception' => true, ], 'AssociatedDomainSummary' => [ 'type' => 'structure', 'members' => [ 'Arn' => [ 'shape' => 'DomainArn', ], 'Name' => [ 'shape' => 'String', ], ], ], 'AssociatedObjectiveSummary' => [ 'type' => 'structure', 'members' => [ 'Arn' => [ 'shape' => 'ObjectiveArn', ], 'Name' => [ 'shape' => 'String', ], ], ], 'CommonControlArn' => [ 'type' => 'string', 'max' => 2048, 'min' => 41, 'pattern' => '^arn:(aws(?:[-a-z]*)?):controlcatalog:::common-control/[0-9a-z]+$', ], 'CommonControlFilter' => [ 'type' => 'structure', 'members' => [ 'Objectives' => [ 'shape' => 'ObjectiveResourceFilterList', ], ], ], 'CommonControlSummary' => [ 'type' => 'structure', 'required' => [ 'Arn', 'CreateTime', 'Description', 'Domain', 'LastUpdateTime', 'Name', 'Objective', ], 'members' => [ 'Arn' => [ 'shape' => 'CommonControlArn', ], 'CreateTime' => [ 'shape' => 'Timestamp', ], 'Description' => [ 'shape' => 'String', ], 'Domain' => [ 'shape' => 'AssociatedDomainSummary', ], 'LastUpdateTime' => [ 'shape' => 'Timestamp', ], 'Name' => [ 'shape' => 'String', ], 'Objective' => [ 'shape' => 'AssociatedObjectiveSummary', ], ], ], 'CommonControlSummaryList' => [ 'type' => 'list', 'member' => [ 'shape' => 'CommonControlSummary', ], ], 'DomainArn' => [ 'type' => 'string', 'max' => 2048, 'min' => 33, 'pattern' => '^arn:(aws(?:[-a-z]*)?):controlcatalog:::domain/[0-9a-z]+$', ], 'DomainResourceFilter' => [ 'type' => 'structure', 'members' => [ 'Arn' => [ 'shape' => 'DomainArn', ], ], ], 'DomainResourceFilterList' => [ 'type' => 'list', 'member' => [ 'shape' => 'DomainResourceFilter', ], ], 'DomainSummary' => [ 'type' => 'structure', 'required' => [ 'Arn', 'CreateTime', 'Description', 'LastUpdateTime', 'Name', ], 'members' => [ 'Arn' => [ 'shape' => 'DomainArn', ], 'CreateTime' => [ 'shape' => 'Timestamp', ], 'Description' => [ 'shape' => 'String', ], 'LastUpdateTime' => [ 'shape' => 'Timestamp', ], 'Name' => [ 'shape' => 'String', ], ], ], 'DomainSummaryList' => [ 'type' => 'list', 'member' => [ 'shape' => 'DomainSummary', ], ], 'InternalServerException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 500, ], 'exception' => true, 'fault' => true, 'retryable' => [ 'throttling' => false, ], ], 'ListCommonControlsRequest' => [ 'type' => 'structure', 'members' => [ 'CommonControlFilter' => [ 'shape' => 'CommonControlFilter', ], 'MaxResults' => [ 'shape' => 'MaxListCommonControlsResults', 'location' => 'querystring', 'locationName' => 'maxResults', ], 'NextToken' => [ 'shape' => 'PaginationToken', 'location' => 'querystring', 'locationName' => 'nextToken', ], ], ], 'ListCommonControlsResponse' => [ 'type' => 'structure', 'required' => [ 'CommonControls', ], 'members' => [ 'CommonControls' => [ 'shape' => 'CommonControlSummaryList', ], 'NextToken' => [ 'shape' => 'PaginationToken', ], ], ], 'ListDomainsRequest' => [ 'type' => 'structure', 'members' => [ 'MaxResults' => [ 'shape' => 'MaxListDomainsResults', 'location' => 'querystring', 'locationName' => 'maxResults', ], 'NextToken' => [ 'shape' => 'PaginationToken', 'location' => 'querystring', 'locationName' => 'nextToken', ], ], ], 'ListDomainsResponse' => [ 'type' => 'structure', 'required' => [ 'Domains', ], 'members' => [ 'Domains' => [ 'shape' => 'DomainSummaryList', ], 'NextToken' => [ 'shape' => 'PaginationToken', ], ], ], 'ListObjectivesRequest' => [ 'type' => 'structure', 'members' => [ 'MaxResults' => [ 'shape' => 'MaxListObjectivesResults', 'location' => 'querystring', 'locationName' => 'maxResults', ], 'NextToken' => [ 'shape' => 'PaginationToken', 'location' => 'querystring', 'locationName' => 'nextToken', ], 'ObjectiveFilter' => [ 'shape' => 'ObjectiveFilter', ], ], ], 'ListObjectivesResponse' => [ 'type' => 'structure', 'required' => [ 'Objectives', ], 'members' => [ 'NextToken' => [ 'shape' => 'PaginationToken', ], 'Objectives' => [ 'shape' => 'ObjectiveSummaryList', ], ], ], 'MaxListCommonControlsResults' => [ 'type' => 'integer', 'box' => true, 'max' => 100, 'min' => 1, ], 'MaxListDomainsResults' => [ 'type' => 'integer', 'box' => true, 'max' => 100, 'min' => 1, ], 'MaxListObjectivesResults' => [ 'type' => 'integer', 'box' => true, 'max' => 100, 'min' => 1, ], 'ObjectiveArn' => [ 'type' => 'string', 'max' => 2048, 'min' => 36, 'pattern' => '^arn:(aws(?:[-a-z]*)?):controlcatalog:::objective/[0-9a-z]+$', ], 'ObjectiveFilter' => [ 'type' => 'structure', 'members' => [ 'Domains' => [ 'shape' => 'DomainResourceFilterList', ], ], ], 'ObjectiveResourceFilter' => [ 'type' => 'structure', 'members' => [ 'Arn' => [ 'shape' => 'ObjectiveArn', ], ], ], 'ObjectiveResourceFilterList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ObjectiveResourceFilter', ], ], 'ObjectiveSummary' => [ 'type' => 'structure', 'required' => [ 'Arn', 'CreateTime', 'Description', 'Domain', 'LastUpdateTime', 'Name', ], 'members' => [ 'Arn' => [ 'shape' => 'ObjectiveArn', ], 'CreateTime' => [ 'shape' => 'Timestamp', ], 'Description' => [ 'shape' => 'String', ], 'Domain' => [ 'shape' => 'AssociatedDomainSummary', ], 'LastUpdateTime' => [ 'shape' => 'Timestamp', ], 'Name' => [ 'shape' => 'String', ], ], ], 'ObjectiveSummaryList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ObjectiveSummary', ], ], 'PaginationToken' => [ 'type' => 'string', 'max' => 1024, 'min' => 0, ], 'String' => [ 'type' => 'string', ], 'ThrottlingException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 429, 'senderFault' => true, ], 'exception' => true, 'retryable' => [ 'throttling' => true, ], ], 'Timestamp' => [ 'type' => 'timestamp', ], 'ValidationException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 400, 'senderFault' => true, ], 'exception' => true, ], ],];
