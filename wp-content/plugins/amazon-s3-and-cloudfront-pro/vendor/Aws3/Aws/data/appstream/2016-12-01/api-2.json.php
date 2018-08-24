<?php

// This file was auto-generated from sdk-root/src/data/appstream/2016-12-01/api-2.json
return ['version' => '2.0', 'metadata' => ['apiVersion' => '2016-12-01', 'endpointPrefix' => 'appstream2', 'jsonVersion' => '1.1', 'protocol' => 'json', 'serviceFullName' => 'Amazon AppStream', 'serviceId' => 'AppStream', 'signatureVersion' => 'v4', 'signingName' => 'appstream', 'targetPrefix' => 'PhotonAdminProxyService', 'uid' => 'appstream-2016-12-01'], 'operations' => ['AssociateFleet' => ['name' => 'AssociateFleet', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'AssociateFleetRequest'], 'output' => ['shape' => 'AssociateFleetResult'], 'errors' => [['shape' => 'LimitExceededException'], ['shape' => 'InvalidAccountStatusException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'ConcurrentModificationException'], ['shape' => 'IncompatibleImageException'], ['shape' => 'OperationNotPermittedException']]], 'CopyImage' => ['name' => 'CopyImage', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'CopyImageRequest'], 'output' => ['shape' => 'CopyImageResponse'], 'errors' => [['shape' => 'ResourceAlreadyExistsException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'ResourceNotAvailableException'], ['shape' => 'LimitExceededException'], ['shape' => 'InvalidAccountStatusException'], ['shape' => 'IncompatibleImageException']]], 'CreateDirectoryConfig' => ['name' => 'CreateDirectoryConfig', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'CreateDirectoryConfigRequest'], 'output' => ['shape' => 'CreateDirectoryConfigResult'], 'errors' => [['shape' => 'ResourceAlreadyExistsException'], ['shape' => 'LimitExceededException'], ['shape' => 'InvalidAccountStatusException']]], 'CreateFleet' => ['name' => 'CreateFleet', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'CreateFleetRequest'], 'output' => ['shape' => 'CreateFleetResult'], 'errors' => [['shape' => 'ResourceAlreadyExistsException'], ['shape' => 'ResourceNotAvailableException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'LimitExceededException'], ['shape' => 'InvalidAccountStatusException'], ['shape' => 'InvalidRoleException'], ['shape' => 'ConcurrentModificationException'], ['shape' => 'InvalidParameterCombinationException'], ['shape' => 'IncompatibleImageException']]], 'CreateImageBuilder' => ['name' => 'CreateImageBuilder', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'CreateImageBuilderRequest'], 'output' => ['shape' => 'CreateImageBuilderResult'], 'errors' => [['shape' => 'LimitExceededException'], ['shape' => 'InvalidAccountStatusException'], ['shape' => 'ResourceAlreadyExistsException'], ['shape' => 'ResourceNotAvailableException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'InvalidRoleException'], ['shape' => 'ConcurrentModificationException'], ['shape' => 'InvalidParameterCombinationException'], ['shape' => 'IncompatibleImageException']]], 'CreateImageBuilderStreamingURL' => ['name' => 'CreateImageBuilderStreamingURL', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'CreateImageBuilderStreamingURLRequest'], 'output' => ['shape' => 'CreateImageBuilderStreamingURLResult'], 'errors' => [['shape' => 'OperationNotPermittedException'], ['shape' => 'ResourceNotFoundException']]], 'CreateStack' => ['name' => 'CreateStack', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'CreateStackRequest'], 'output' => ['shape' => 'CreateStackResult'], 'errors' => [['shape' => 'LimitExceededException'], ['shape' => 'InvalidAccountStatusException'], ['shape' => 'ResourceAlreadyExistsException'], ['shape' => 'ConcurrentModificationException'], ['shape' => 'InvalidRoleException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'InvalidParameterCombinationException']]], 'CreateStreamingURL' => ['name' => 'CreateStreamingURL', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'CreateStreamingURLRequest'], 'output' => ['shape' => 'CreateStreamingURLResult'], 'errors' => [['shape' => 'ResourceNotFoundException'], ['shape' => 'ResourceNotAvailableException'], ['shape' => 'OperationNotPermittedException'], ['shape' => 'InvalidParameterCombinationException']]], 'DeleteDirectoryConfig' => ['name' => 'DeleteDirectoryConfig', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'DeleteDirectoryConfigRequest'], 'output' => ['shape' => 'DeleteDirectoryConfigResult'], 'errors' => [['shape' => 'ResourceInUseException'], ['shape' => 'ResourceNotFoundException']]], 'DeleteFleet' => ['name' => 'DeleteFleet', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'DeleteFleetRequest'], 'output' => ['shape' => 'DeleteFleetResult'], 'errors' => [['shape' => 'ResourceInUseException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'ConcurrentModificationException']]], 'DeleteImage' => ['name' => 'DeleteImage', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'DeleteImageRequest'], 'output' => ['shape' => 'DeleteImageResult'], 'errors' => [['shape' => 'ResourceInUseException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'OperationNotPermittedException'], ['shape' => 'ConcurrentModificationException']]], 'DeleteImageBuilder' => ['name' => 'DeleteImageBuilder', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'DeleteImageBuilderRequest'], 'output' => ['shape' => 'DeleteImageBuilderResult'], 'errors' => [['shape' => 'ResourceNotFoundException'], ['shape' => 'OperationNotPermittedException'], ['shape' => 'ConcurrentModificationException']]], 'DeleteStack' => ['name' => 'DeleteStack', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'DeleteStackRequest'], 'output' => ['shape' => 'DeleteStackResult'], 'errors' => [['shape' => 'ResourceInUseException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'ConcurrentModificationException']]], 'DescribeDirectoryConfigs' => ['name' => 'DescribeDirectoryConfigs', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'DescribeDirectoryConfigsRequest'], 'output' => ['shape' => 'DescribeDirectoryConfigsResult'], 'errors' => [['shape' => 'ResourceNotFoundException']]], 'DescribeFleets' => ['name' => 'DescribeFleets', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'DescribeFleetsRequest'], 'output' => ['shape' => 'DescribeFleetsResult'], 'errors' => [['shape' => 'ResourceNotFoundException']]], 'DescribeImageBuilders' => ['name' => 'DescribeImageBuilders', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'DescribeImageBuildersRequest'], 'output' => ['shape' => 'DescribeImageBuildersResult'], 'errors' => [['shape' => 'ResourceNotFoundException']]], 'DescribeImages' => ['name' => 'DescribeImages', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'DescribeImagesRequest'], 'output' => ['shape' => 'DescribeImagesResult'], 'errors' => [['shape' => 'ResourceNotFoundException']]], 'DescribeSessions' => ['name' => 'DescribeSessions', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'DescribeSessionsRequest'], 'output' => ['shape' => 'DescribeSessionsResult'], 'errors' => [['shape' => 'InvalidParameterCombinationException']]], 'DescribeStacks' => ['name' => 'DescribeStacks', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'DescribeStacksRequest'], 'output' => ['shape' => 'DescribeStacksResult'], 'errors' => [['shape' => 'ResourceNotFoundException']]], 'DisassociateFleet' => ['name' => 'DisassociateFleet', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'DisassociateFleetRequest'], 'output' => ['shape' => 'DisassociateFleetResult'], 'errors' => [['shape' => 'ResourceInUseException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'ConcurrentModificationException']]], 'ExpireSession' => ['name' => 'ExpireSession', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'ExpireSessionRequest'], 'output' => ['shape' => 'ExpireSessionResult']], 'ListAssociatedFleets' => ['name' => 'ListAssociatedFleets', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'ListAssociatedFleetsRequest'], 'output' => ['shape' => 'ListAssociatedFleetsResult']], 'ListAssociatedStacks' => ['name' => 'ListAssociatedStacks', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'ListAssociatedStacksRequest'], 'output' => ['shape' => 'ListAssociatedStacksResult']], 'ListTagsForResource' => ['name' => 'ListTagsForResource', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'ListTagsForResourceRequest'], 'output' => ['shape' => 'ListTagsForResourceResponse'], 'errors' => [['shape' => 'ResourceNotFoundException']]], 'StartFleet' => ['name' => 'StartFleet', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'StartFleetRequest'], 'output' => ['shape' => 'StartFleetResult'], 'errors' => [['shape' => 'ResourceNotFoundException'], ['shape' => 'OperationNotPermittedException'], ['shape' => 'LimitExceededException'], ['shape' => 'InvalidAccountStatusException'], ['shape' => 'ConcurrentModificationException']]], 'StartImageBuilder' => ['name' => 'StartImageBuilder', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'StartImageBuilderRequest'], 'output' => ['shape' => 'StartImageBuilderResult'], 'errors' => [['shape' => 'ResourceNotAvailableException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'ConcurrentModificationException'], ['shape' => 'InvalidAccountStatusException'], ['shape' => 'IncompatibleImageException']]], 'StopFleet' => ['name' => 'StopFleet', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'StopFleetRequest'], 'output' => ['shape' => 'StopFleetResult'], 'errors' => [['shape' => 'ResourceNotFoundException'], ['shape' => 'ConcurrentModificationException']]], 'StopImageBuilder' => ['name' => 'StopImageBuilder', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'StopImageBuilderRequest'], 'output' => ['shape' => 'StopImageBuilderResult'], 'errors' => [['shape' => 'ResourceNotFoundException'], ['shape' => 'OperationNotPermittedException'], ['shape' => 'ConcurrentModificationException']]], 'TagResource' => ['name' => 'TagResource', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'TagResourceRequest'], 'output' => ['shape' => 'TagResourceResponse'], 'errors' => [['shape' => 'LimitExceededException'], ['shape' => 'InvalidAccountStatusException'], ['shape' => 'ResourceNotFoundException']]], 'UntagResource' => ['name' => 'UntagResource', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'UntagResourceRequest'], 'output' => ['shape' => 'UntagResourceResponse'], 'errors' => [['shape' => 'ResourceNotFoundException']]], 'UpdateDirectoryConfig' => ['name' => 'UpdateDirectoryConfig', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'UpdateDirectoryConfigRequest'], 'output' => ['shape' => 'UpdateDirectoryConfigResult'], 'errors' => [['shape' => 'ResourceInUseException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'ConcurrentModificationException']]], 'UpdateFleet' => ['name' => 'UpdateFleet', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'UpdateFleetRequest'], 'output' => ['shape' => 'UpdateFleetResult'], 'errors' => [['shape' => 'ResourceInUseException'], ['shape' => 'LimitExceededException'], ['shape' => 'InvalidAccountStatusException'], ['shape' => 'InvalidRoleException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'ResourceNotAvailableException'], ['shape' => 'InvalidParameterCombinationException'], ['shape' => 'ConcurrentModificationException'], ['shape' => 'IncompatibleImageException'], ['shape' => 'OperationNotPermittedException']]], 'UpdateStack' => ['name' => 'UpdateStack', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'UpdateStackRequest'], 'output' => ['shape' => 'UpdateStackResult'], 'errors' => [['shape' => 'ResourceNotFoundException'], ['shape' => 'ResourceInUseException'], ['shape' => 'InvalidRoleException'], ['shape' => 'InvalidParameterCombinationException'], ['shape' => 'LimitExceededException'], ['shape' => 'InvalidAccountStatusException'], ['shape' => 'IncompatibleImageException'], ['shape' => 'OperationNotPermittedException']]]], 'shapes' => ['AccountName' => ['type' => 'string', 'min' => 1, 'sensitive' => \true], 'AccountPassword' => ['type' => 'string', 'max' => 127, 'min' => 1, 'sensitive' => \true], 'Action' => ['type' => 'string', 'enum' => ['CLIPBOARD_COPY_FROM_LOCAL_DEVICE', 'CLIPBOARD_COPY_TO_LOCAL_DEVICE', 'FILE_UPLOAD', 'FILE_DOWNLOAD', 'PRINTING_TO_LOCAL_DEVICE']], 'Application' => ['type' => 'structure', 'members' => ['Name' => ['shape' => 'String'], 'DisplayName' => ['shape' => 'String'], 'IconURL' => ['shape' => 'String'], 'LaunchPath' => ['shape' => 'String'], 'LaunchParameters' => ['shape' => 'String'], 'Enabled' => ['shape' => 'Boolean'], 'Metadata' => ['shape' => 'Metadata']]], 'Applications' => ['type' => 'list', 'member' => ['shape' => 'Application']], 'AppstreamAgentVersion' => ['type' => 'string', 'max' => 100, 'min' => 1], 'Arn' => ['type' => 'string', 'pattern' => '^arn:aws:[A-Za-z0-9][A-Za-z0-9_/.-]{0,62}:[A-Za-z0-9_/.-]{0,63}:[A-Za-z0-9_/.-]{0,63}:[A-Za-z0-9][A-Za-z0-9:_/+=,@.-]{0,1023}$'], 'AssociateFleetRequest' => ['type' => 'structure', 'required' => ['FleetName', 'StackName'], 'members' => ['FleetName' => ['shape' => 'String'], 'StackName' => ['shape' => 'String']]], 'AssociateFleetResult' => ['type' => 'structure', 'members' => []], 'AuthenticationType' => ['type' => 'string', 'enum' => ['API', 'SAML', 'USERPOOL']], 'Boolean' => ['type' => 'boolean'], 'BooleanObject' => ['type' => 'boolean'], 'ComputeCapacity' => ['type' => 'structure', 'required' => ['DesiredInstances'], 'members' => ['DesiredInstances' => ['shape' => 'Integer']]], 'ComputeCapacityStatus' => ['type' => 'structure', 'required' => ['Desired'], 'members' => ['Desired' => ['shape' => 'Integer'], 'Running' => ['shape' => 'Integer'], 'InUse' => ['shape' => 'Integer'], 'Available' => ['shape' => 'Integer']]], 'ConcurrentModificationException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'ErrorMessage']], 'exception' => \true], 'CopyImageRequest' => ['type' => 'structure', 'required' => ['SourceImageName', 'DestinationImageName', 'DestinationRegion'], 'members' => ['SourceImageName' => ['shape' => 'Name'], 'DestinationImageName' => ['shape' => 'Name'], 'DestinationRegion' => ['shape' => 'RegionName'], 'DestinationImageDescription' => ['shape' => 'Description']]], 'CopyImageResponse' => ['type' => 'structure', 'members' => ['DestinationImageName' => ['shape' => 'Name']]], 'CreateDirectoryConfigRequest' => ['type' => 'structure', 'required' => ['DirectoryName', 'OrganizationalUnitDistinguishedNames', 'ServiceAccountCredentials'], 'members' => ['DirectoryName' => ['shape' => 'DirectoryName'], 'OrganizationalUnitDistinguishedNames' => ['shape' => 'OrganizationalUnitDistinguishedNamesList'], 'ServiceAccountCredentials' => ['shape' => 'ServiceAccountCredentials']]], 'CreateDirectoryConfigResult' => ['type' => 'structure', 'members' => ['DirectoryConfig' => ['shape' => 'DirectoryConfig']]], 'CreateFleetRequest' => ['type' => 'structure', 'required' => ['Name', 'ImageName', 'InstanceType', 'ComputeCapacity'], 'members' => ['Name' => ['shape' => 'Name'], 'ImageName' => ['shape' => 'String'], 'InstanceType' => ['shape' => 'String'], 'FleetType' => ['shape' => 'FleetType'], 'ComputeCapacity' => ['shape' => 'ComputeCapacity'], 'VpcConfig' => ['shape' => 'VpcConfig'], 'MaxUserDurationInSeconds' => ['shape' => 'Integer'], 'DisconnectTimeoutInSeconds' => ['shape' => 'Integer'], 'Description' => ['shape' => 'Description'], 'DisplayName' => ['shape' => 'DisplayName'], 'EnableDefaultInternetAccess' => ['shape' => 'BooleanObject'], 'DomainJoinInfo' => ['shape' => 'DomainJoinInfo']]], 'CreateFleetResult' => ['type' => 'structure', 'members' => ['Fleet' => ['shape' => 'Fleet']]], 'CreateImageBuilderRequest' => ['type' => 'structure', 'required' => ['Name', 'ImageName', 'InstanceType'], 'members' => ['Name' => ['shape' => 'Name'], 'ImageName' => ['shape' => 'String'], 'InstanceType' => ['shape' => 'String'], 'Description' => ['shape' => 'Description'], 'DisplayName' => ['shape' => 'DisplayName'], 'VpcConfig' => ['shape' => 'VpcConfig'], 'EnableDefaultInternetAccess' => ['shape' => 'BooleanObject'], 'DomainJoinInfo' => ['shape' => 'DomainJoinInfo'], 'AppstreamAgentVersion' => ['shape' => 'AppstreamAgentVersion']]], 'CreateImageBuilderResult' => ['type' => 'structure', 'members' => ['ImageBuilder' => ['shape' => 'ImageBuilder']]], 'CreateImageBuilderStreamingURLRequest' => ['type' => 'structure', 'required' => ['Name'], 'members' => ['Name' => ['shape' => 'String'], 'Validity' => ['shape' => 'Long']]], 'CreateImageBuilderStreamingURLResult' => ['type' => 'structure', 'members' => ['StreamingURL' => ['shape' => 'String'], 'Expires' => ['shape' => 'Timestamp']]], 'CreateStackRequest' => ['type' => 'structure', 'required' => ['Name'], 'members' => ['Name' => ['shape' => 'Name'], 'Description' => ['shape' => 'Description'], 'DisplayName' => ['shape' => 'DisplayName'], 'StorageConnectors' => ['shape' => 'StorageConnectorList'], 'RedirectURL' => ['shape' => 'RedirectURL'], 'FeedbackURL' => ['shape' => 'FeedbackURL'], 'UserSettings' => ['shape' => 'UserSettingList']]], 'CreateStackResult' => ['type' => 'structure', 'members' => ['Stack' => ['shape' => 'Stack']]], 'CreateStreamingURLRequest' => ['type' => 'structure', 'required' => ['StackName', 'FleetName', 'UserId'], 'members' => ['StackName' => ['shape' => 'String'], 'FleetName' => ['shape' => 'String'], 'UserId' => ['shape' => 'StreamingUrlUserId'], 'ApplicationId' => ['shape' => 'String'], 'Validity' => ['shape' => 'Long'], 'SessionContext' => ['shape' => 'String']]], 'CreateStreamingURLResult' => ['type' => 'structure', 'members' => ['StreamingURL' => ['shape' => 'String'], 'Expires' => ['shape' => 'Timestamp']]], 'DeleteDirectoryConfigRequest' => ['type' => 'structure', 'required' => ['DirectoryName'], 'members' => ['DirectoryName' => ['shape' => 'DirectoryName']]], 'DeleteDirectoryConfigResult' => ['type' => 'structure', 'members' => []], 'DeleteFleetRequest' => ['type' => 'structure', 'required' => ['Name'], 'members' => ['Name' => ['shape' => 'String']]], 'DeleteFleetResult' => ['type' => 'structure', 'members' => []], 'DeleteImageBuilderRequest' => ['type' => 'structure', 'required' => ['Name'], 'members' => ['Name' => ['shape' => 'Name']]], 'DeleteImageBuilderResult' => ['type' => 'structure', 'members' => ['ImageBuilder' => ['shape' => 'ImageBuilder']]], 'DeleteImageRequest' => ['type' => 'structure', 'required' => ['Name'], 'members' => ['Name' => ['shape' => 'Name']]], 'DeleteImageResult' => ['type' => 'structure', 'members' => ['Image' => ['shape' => 'Image']]], 'DeleteStackRequest' => ['type' => 'structure', 'required' => ['Name'], 'members' => ['Name' => ['shape' => 'String']]], 'DeleteStackResult' => ['type' => 'structure', 'members' => []], 'DescribeDirectoryConfigsRequest' => ['type' => 'structure', 'members' => ['DirectoryNames' => ['shape' => 'DirectoryNameList'], 'MaxResults' => ['shape' => 'Integer'], 'NextToken' => ['shape' => 'String']]], 'DescribeDirectoryConfigsResult' => ['type' => 'structure', 'members' => ['DirectoryConfigs' => ['shape' => 'DirectoryConfigList'], 'NextToken' => ['shape' => 'String']]], 'DescribeFleetsRequest' => ['type' => 'structure', 'members' => ['Names' => ['shape' => 'StringList'], 'NextToken' => ['shape' => 'String']]], 'DescribeFleetsResult' => ['type' => 'structure', 'members' => ['Fleets' => ['shape' => 'FleetList'], 'NextToken' => ['shape' => 'String']]], 'DescribeImageBuildersRequest' => ['type' => 'structure', 'members' => ['Names' => ['shape' => 'StringList'], 'MaxResults' => ['shape' => 'Integer'], 'NextToken' => ['shape' => 'String']]], 'DescribeImageBuildersResult' => ['type' => 'structure', 'members' => ['ImageBuilders' => ['shape' => 'ImageBuilderList'], 'NextToken' => ['shape' => 'String']]], 'DescribeImagesRequest' => ['type' => 'structure', 'members' => ['Names' => ['shape' => 'StringList']]], 'DescribeImagesResult' => ['type' => 'structure', 'members' => ['Images' => ['shape' => 'ImageList']]], 'DescribeSessionsRequest' => ['type' => 'structure', 'required' => ['StackName', 'FleetName'], 'members' => ['StackName' => ['shape' => 'String'], 'FleetName' => ['shape' => 'String'], 'UserId' => ['shape' => 'UserId'], 'NextToken' => ['shape' => 'String'], 'Limit' => ['shape' => 'Integer'], 'AuthenticationType' => ['shape' => 'AuthenticationType']]], 'DescribeSessionsResult' => ['type' => 'structure', 'members' => ['Sessions' => ['shape' => 'SessionList'], 'NextToken' => ['shape' => 'String']]], 'DescribeStacksRequest' => ['type' => 'structure', 'members' => ['Names' => ['shape' => 'StringList'], 'NextToken' => ['shape' => 'String']]], 'DescribeStacksResult' => ['type' => 'structure', 'members' => ['Stacks' => ['shape' => 'StackList'], 'NextToken' => ['shape' => 'String']]], 'Description' => ['type' => 'string', 'max' => 256], 'DirectoryConfig' => ['type' => 'structure', 'required' => ['DirectoryName'], 'members' => ['DirectoryName' => ['shape' => 'DirectoryName'], 'OrganizationalUnitDistinguishedNames' => ['shape' => 'OrganizationalUnitDistinguishedNamesList'], 'ServiceAccountCredentials' => ['shape' => 'ServiceAccountCredentials'], 'CreatedTime' => ['shape' => 'Timestamp']]], 'DirectoryConfigList' => ['type' => 'list', 'member' => ['shape' => 'DirectoryConfig']], 'DirectoryName' => ['type' => 'string'], 'DirectoryNameList' => ['type' => 'list', 'member' => ['shape' => 'DirectoryName']], 'DisassociateFleetRequest' => ['type' => 'structure', 'required' => ['FleetName', 'StackName'], 'members' => ['FleetName' => ['shape' => 'String'], 'StackName' => ['shape' => 'String']]], 'DisassociateFleetResult' => ['type' => 'structure', 'members' => []], 'DisplayName' => ['type' => 'string', 'max' => 100], 'Domain' => ['type' => 'string', 'max' => 64], 'DomainJoinInfo' => ['type' => 'structure', 'members' => ['DirectoryName' => ['shape' => 'DirectoryName'], 'OrganizationalUnitDistinguishedName' => ['shape' => 'OrganizationalUnitDistinguishedName']]], 'DomainList' => ['type' => 'list', 'member' => ['shape' => 'Domain'], 'max' => 10], 'ErrorMessage' => ['type' => 'string'], 'ExpireSessionRequest' => ['type' => 'structure', 'required' => ['SessionId'], 'members' => ['SessionId' => ['shape' => 'String']]], 'ExpireSessionResult' => ['type' => 'structure', 'members' => []], 'FeedbackURL' => ['type' => 'string', 'max' => 1000], 'Fleet' => ['type' => 'structure', 'required' => ['Arn', 'Name', 'ImageName', 'InstanceType', 'ComputeCapacityStatus', 'State'], 'members' => ['Arn' => ['shape' => 'Arn'], 'Name' => ['shape' => 'String'], 'DisplayName' => ['shape' => 'String'], 'Description' => ['shape' => 'String'], 'ImageName' => ['shape' => 'String'], 'InstanceType' => ['shape' => 'String'], 'FleetType' => ['shape' => 'FleetType'], 'ComputeCapacityStatus' => ['shape' => 'ComputeCapacityStatus'], 'MaxUserDurationInSeconds' => ['shape' => 'Integer'], 'DisconnectTimeoutInSeconds' => ['shape' => 'Integer'], 'State' => ['shape' => 'FleetState'], 'VpcConfig' => ['shape' => 'VpcConfig'], 'CreatedTime' => ['shape' => 'Timestamp'], 'FleetErrors' => ['shape' => 'FleetErrors'], 'EnableDefaultInternetAccess' => ['shape' => 'BooleanObject'], 'DomainJoinInfo' => ['shape' => 'DomainJoinInfo']]], 'FleetAttribute' => ['type' => 'string', 'enum' => ['VPC_CONFIGURATION', 'VPC_CONFIGURATION_SECURITY_GROUP_IDS', 'DOMAIN_JOIN_INFO']], 'FleetAttributes' => ['type' => 'list', 'member' => ['shape' => 'FleetAttribute']], 'FleetError' => ['type' => 'structure', 'members' => ['ErrorCode' => ['shape' => 'FleetErrorCode'], 'ErrorMessage' => ['shape' => 'String']]], 'FleetErrorCode' => ['type' => 'string', 'enum' => ['IAM_SERVICE_ROLE_MISSING_ENI_DESCRIBE_ACTION', 'IAM_SERVICE_ROLE_MISSING_ENI_CREATE_ACTION', 'IAM_SERVICE_ROLE_MISSING_ENI_DELETE_ACTION', 'NETWORK_INTERFACE_LIMIT_EXCEEDED', 'INTERNAL_SERVICE_ERROR', 'IAM_SERVICE_ROLE_IS_MISSING', 'SUBNET_HAS_INSUFFICIENT_IP_ADDRESSES', 'IAM_SERVICE_ROLE_MISSING_DESCRIBE_SUBNET_ACTION', 'SUBNET_NOT_FOUND', 'IMAGE_NOT_FOUND', 'INVALID_SUBNET_CONFIGURATION', 'SECURITY_GROUPS_NOT_FOUND', 'IGW_NOT_ATTACHED', 'IAM_SERVICE_ROLE_MISSING_DESCRIBE_SECURITY_GROUPS_ACTION', 'DOMAIN_JOIN_ERROR_FILE_NOT_FOUND', 'DOMAIN_JOIN_ERROR_ACCESS_DENIED', 'DOMAIN_JOIN_ERROR_LOGON_FAILURE', 'DOMAIN_JOIN_ERROR_INVALID_PARAMETER', 'DOMAIN_JOIN_ERROR_MORE_DATA', 'DOMAIN_JOIN_ERROR_NO_SUCH_DOMAIN', 'DOMAIN_JOIN_ERROR_NOT_SUPPORTED', 'DOMAIN_JOIN_NERR_INVALID_WORKGROUP_NAME', 'DOMAIN_JOIN_NERR_WORKSTATION_NOT_STARTED', 'DOMAIN_JOIN_ERROR_DS_MACHINE_ACCOUNT_QUOTA_EXCEEDED', 'DOMAIN_JOIN_NERR_PASSWORD_EXPIRED', 'DOMAIN_JOIN_INTERNAL_SERVICE_ERROR']], 'FleetErrors' => ['type' => 'list', 'member' => ['shape' => 'FleetError']], 'FleetList' => ['type' => 'list', 'member' => ['shape' => 'Fleet']], 'FleetState' => ['type' => 'string', 'enum' => ['STARTING', 'RUNNING', 'STOPPING', 'STOPPED']], 'FleetType' => ['type' => 'string', 'enum' => ['ALWAYS_ON', 'ON_DEMAND']], 'Image' => ['type' => 'structure', 'required' => ['Name'], 'members' => ['Name' => ['shape' => 'String'], 'Arn' => ['shape' => 'Arn'], 'BaseImageArn' => ['shape' => 'Arn'], 'DisplayName' => ['shape' => 'String'], 'State' => ['shape' => 'ImageState'], 'Visibility' => ['shape' => 'VisibilityType'], 'ImageBuilderSupported' => ['shape' => 'Boolean'], 'Platform' => ['shape' => 'PlatformType'], 'Description' => ['shape' => 'String'], 'StateChangeReason' => ['shape' => 'ImageStateChangeReason'], 'Applications' => ['shape' => 'Applications'], 'CreatedTime' => ['shape' => 'Timestamp'], 'PublicBaseImageReleasedDate' => ['shape' => 'Timestamp'], 'AppstreamAgentVersion' => ['shape' => 'AppstreamAgentVersion']]], 'ImageBuilder' => ['type' => 'structure', 'required' => ['Name'], 'members' => ['Name' => ['shape' => 'String'], 'Arn' => ['shape' => 'Arn'], 'ImageArn' => ['shape' => 'Arn'], 'Description' => ['shape' => 'String'], 'DisplayName' => ['shape' => 'String'], 'VpcConfig' => ['shape' => 'VpcConfig'], 'InstanceType' => ['shape' => 'String'], 'Platform' => ['shape' => 'PlatformType'], 'State' => ['shape' => 'ImageBuilderState'], 'StateChangeReason' => ['shape' => 'ImageBuilderStateChangeReason'], 'CreatedTime' => ['shape' => 'Timestamp'], 'EnableDefaultInternetAccess' => ['shape' => 'BooleanObject'], 'DomainJoinInfo' => ['shape' => 'DomainJoinInfo'], 'ImageBuilderErrors' => ['shape' => 'ResourceErrors'], 'AppstreamAgentVersion' => ['shape' => 'AppstreamAgentVersion']]], 'ImageBuilderList' => ['type' => 'list', 'member' => ['shape' => 'ImageBuilder']], 'ImageBuilderState' => ['type' => 'string', 'enum' => ['PENDING', 'UPDATING_AGENT', 'RUNNING', 'STOPPING', 'STOPPED', 'REBOOTING', 'SNAPSHOTTING', 'DELETING', 'FAILED']], 'ImageBuilderStateChangeReason' => ['type' => 'structure', 'members' => ['Code' => ['shape' => 'ImageBuilderStateChangeReasonCode'], 'Message' => ['shape' => 'String']]], 'ImageBuilderStateChangeReasonCode' => ['type' => 'string', 'enum' => ['INTERNAL_ERROR', 'IMAGE_UNAVAILABLE']], 'ImageList' => ['type' => 'list', 'member' => ['shape' => 'Image']], 'ImageState' => ['type' => 'string', 'enum' => ['PENDING', 'AVAILABLE', 'FAILED', 'COPYING', 'DELETING']], 'ImageStateChangeReason' => ['type' => 'structure', 'members' => ['Code' => ['shape' => 'ImageStateChangeReasonCode'], 'Message' => ['shape' => 'String']]], 'ImageStateChangeReasonCode' => ['type' => 'string', 'enum' => ['INTERNAL_ERROR', 'IMAGE_BUILDER_NOT_AVAILABLE', 'IMAGE_COPY_FAILURE']], 'IncompatibleImageException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'ErrorMessage']], 'exception' => \true], 'Integer' => ['type' => 'integer'], 'InvalidAccountStatusException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'ErrorMessage']], 'exception' => \true], 'InvalidParameterCombinationException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'ErrorMessage']], 'exception' => \true], 'InvalidRoleException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'ErrorMessage']], 'exception' => \true], 'LimitExceededException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'ErrorMessage']], 'exception' => \true], 'ListAssociatedFleetsRequest' => ['type' => 'structure', 'required' => ['StackName'], 'members' => ['StackName' => ['shape' => 'String'], 'NextToken' => ['shape' => 'String']]], 'ListAssociatedFleetsResult' => ['type' => 'structure', 'members' => ['Names' => ['shape' => 'StringList'], 'NextToken' => ['shape' => 'String']]], 'ListAssociatedStacksRequest' => ['type' => 'structure', 'required' => ['FleetName'], 'members' => ['FleetName' => ['shape' => 'String'], 'NextToken' => ['shape' => 'String']]], 'ListAssociatedStacksResult' => ['type' => 'structure', 'members' => ['Names' => ['shape' => 'StringList'], 'NextToken' => ['shape' => 'String']]], 'ListTagsForResourceRequest' => ['type' => 'structure', 'required' => ['ResourceArn'], 'members' => ['ResourceArn' => ['shape' => 'Arn']]], 'ListTagsForResourceResponse' => ['type' => 'structure', 'members' => ['Tags' => ['shape' => 'Tags']]], 'Long' => ['type' => 'long'], 'Metadata' => ['type' => 'map', 'key' => ['shape' => 'String'], 'value' => ['shape' => 'String']], 'Name' => ['type' => 'string', 'pattern' => '^[a-zA-Z0-9][a-zA-Z0-9_.-]{0,100}$'], 'NetworkAccessConfiguration' => ['type' => 'structure', 'members' => ['EniPrivateIpAddress' => ['shape' => 'String'], 'EniId' => ['shape' => 'String']]], 'OperationNotPermittedException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'ErrorMessage']], 'exception' => \true], 'OrganizationalUnitDistinguishedName' => ['type' => 'string', 'max' => 2000], 'OrganizationalUnitDistinguishedNamesList' => ['type' => 'list', 'member' => ['shape' => 'OrganizationalUnitDistinguishedName']], 'Permission' => ['type' => 'string', 'enum' => ['ENABLED', 'DISABLED']], 'PlatformType' => ['type' => 'string', 'enum' => ['WINDOWS']], 'RedirectURL' => ['type' => 'string', 'max' => 1000], 'RegionName' => ['type' => 'string', 'max' => 32, 'min' => 1], 'ResourceAlreadyExistsException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'ErrorMessage']], 'exception' => \true], 'ResourceError' => ['type' => 'structure', 'members' => ['ErrorCode' => ['shape' => 'FleetErrorCode'], 'ErrorMessage' => ['shape' => 'String'], 'ErrorTimestamp' => ['shape' => 'Timestamp']]], 'ResourceErrors' => ['type' => 'list', 'member' => ['shape' => 'ResourceError']], 'ResourceIdentifier' => ['type' => 'string', 'min' => 1], 'ResourceInUseException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'ErrorMessage']], 'exception' => \true], 'ResourceNotAvailableException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'ErrorMessage']], 'exception' => \true], 'ResourceNotFoundException' => ['type' => 'structure', 'members' => ['Message' => ['shape' => 'ErrorMessage']], 'exception' => \true], 'SecurityGroupIdList' => ['type' => 'list', 'member' => ['shape' => 'String'], 'max' => 5], 'ServiceAccountCredentials' => ['type' => 'structure', 'required' => ['AccountName', 'AccountPassword'], 'members' => ['AccountName' => ['shape' => 'AccountName'], 'AccountPassword' => ['shape' => 'AccountPassword']]], 'Session' => ['type' => 'structure', 'required' => ['Id', 'UserId', 'StackName', 'FleetName', 'State'], 'members' => ['Id' => ['shape' => 'String'], 'UserId' => ['shape' => 'UserId'], 'StackName' => ['shape' => 'String'], 'FleetName' => ['shape' => 'String'], 'State' => ['shape' => 'SessionState'], 'AuthenticationType' => ['shape' => 'AuthenticationType'], 'NetworkAccessConfiguration' => ['shape' => 'NetworkAccessConfiguration']]], 'SessionList' => ['type' => 'list', 'member' => ['shape' => 'Session']], 'SessionState' => ['type' => 'string', 'enum' => ['ACTIVE', 'PENDING', 'EXPIRED']], 'Stack' => ['type' => 'structure', 'required' => ['Name'], 'members' => ['Arn' => ['shape' => 'Arn'], 'Name' => ['shape' => 'String'], 'Description' => ['shape' => 'String'], 'DisplayName' => ['shape' => 'String'], 'CreatedTime' => ['shape' => 'Timestamp'], 'StorageConnectors' => ['shape' => 'StorageConnectorList'], 'RedirectURL' => ['shape' => 'RedirectURL'], 'FeedbackURL' => ['shape' => 'FeedbackURL'], 'StackErrors' => ['shape' => 'StackErrors'], 'UserSettings' => ['shape' => 'UserSettingList']]], 'StackAttribute' => ['type' => 'string', 'enum' => ['STORAGE_CONNECTORS', 'STORAGE_CONNECTOR_HOMEFOLDERS', 'STORAGE_CONNECTOR_GOOGLE_DRIVE', 'REDIRECT_URL', 'FEEDBACK_URL', 'THEME_NAME', 'USER_SETTINGS']], 'StackAttributes' => ['type' => 'list', 'member' => ['shape' => 'StackAttribute']], 'StackError' => ['type' => 'structure', 'members' => ['ErrorCode' => ['shape' => 'StackErrorCode'], 'ErrorMessage' => ['shape' => 'String']]], 'StackErrorCode' => ['type' => 'string', 'enum' => ['STORAGE_CONNECTOR_ERROR', 'INTERNAL_SERVICE_ERROR']], 'StackErrors' => ['type' => 'list', 'member' => ['shape' => 'StackError']], 'StackList' => ['type' => 'list', 'member' => ['shape' => 'Stack']], 'StartFleetRequest' => ['type' => 'structure', 'required' => ['Name'], 'members' => ['Name' => ['shape' => 'String']]], 'StartFleetResult' => ['type' => 'structure', 'members' => []], 'StartImageBuilderRequest' => ['type' => 'structure', 'required' => ['Name'], 'members' => ['Name' => ['shape' => 'String'], 'AppstreamAgentVersion' => ['shape' => 'AppstreamAgentVersion']]], 'StartImageBuilderResult' => ['type' => 'structure', 'members' => ['ImageBuilder' => ['shape' => 'ImageBuilder']]], 'StopFleetRequest' => ['type' => 'structure', 'required' => ['Name'], 'members' => ['Name' => ['shape' => 'String']]], 'StopFleetResult' => ['type' => 'structure', 'members' => []], 'StopImageBuilderRequest' => ['type' => 'structure', 'required' => ['Name'], 'members' => ['Name' => ['shape' => 'String']]], 'StopImageBuilderResult' => ['type' => 'structure', 'members' => ['ImageBuilder' => ['shape' => 'ImageBuilder']]], 'StorageConnector' => ['type' => 'structure', 'required' => ['ConnectorType'], 'members' => ['ConnectorType' => ['shape' => 'StorageConnectorType'], 'ResourceIdentifier' => ['shape' => 'ResourceIdentifier'], 'Domains' => ['shape' => 'DomainList']]], 'StorageConnectorList' => ['type' => 'list', 'member' => ['shape' => 'StorageConnector']], 'StorageConnectorType' => ['type' => 'string', 'enum' => ['HOMEFOLDERS', 'GOOGLE_DRIVE']], 'StreamingUrlUserId' => ['type' => 'string', 'max' => 32, 'min' => 2, 'pattern' => '[\\w+=,.@-]*'], 'String' => ['type' => 'string', 'min' => 1], 'StringList' => ['type' => 'list', 'member' => ['shape' => 'String']], 'SubnetIdList' => ['type' => 'list', 'member' => ['shape' => 'String']], 'TagKey' => ['type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => '^(^(?!aws:).[\\p{L}\\p{Z}\\p{N}_.:/=+\\-@]*)$'], 'TagKeyList' => ['type' => 'list', 'member' => ['shape' => 'TagKey'], 'max' => 50, 'min' => 1], 'TagResourceRequest' => ['type' => 'structure', 'required' => ['ResourceArn', 'Tags'], 'members' => ['ResourceArn' => ['shape' => 'Arn'], 'Tags' => ['shape' => 'Tags']]], 'TagResourceResponse' => ['type' => 'structure', 'members' => []], 'TagValue' => ['type' => 'string', 'max' => 256, 'min' => 0, 'pattern' => '^([\\p{L}\\p{Z}\\p{N}_.:/=+\\-@]*)$'], 'Tags' => ['type' => 'map', 'key' => ['shape' => 'TagKey'], 'value' => ['shape' => 'TagValue'], 'max' => 50, 'min' => 1], 'Timestamp' => ['type' => 'timestamp'], 'UntagResourceRequest' => ['type' => 'structure', 'required' => ['ResourceArn', 'TagKeys'], 'members' => ['ResourceArn' => ['shape' => 'Arn'], 'TagKeys' => ['shape' => 'TagKeyList']]], 'UntagResourceResponse' => ['type' => 'structure', 'members' => []], 'UpdateDirectoryConfigRequest' => ['type' => 'structure', 'required' => ['DirectoryName'], 'members' => ['DirectoryName' => ['shape' => 'DirectoryName'], 'OrganizationalUnitDistinguishedNames' => ['shape' => 'OrganizationalUnitDistinguishedNamesList'], 'ServiceAccountCredentials' => ['shape' => 'ServiceAccountCredentials']]], 'UpdateDirectoryConfigResult' => ['type' => 'structure', 'members' => ['DirectoryConfig' => ['shape' => 'DirectoryConfig']]], 'UpdateFleetRequest' => ['type' => 'structure', 'required' => ['Name'], 'members' => ['ImageName' => ['shape' => 'String'], 'Name' => ['shape' => 'String'], 'InstanceType' => ['shape' => 'String'], 'ComputeCapacity' => ['shape' => 'ComputeCapacity'], 'VpcConfig' => ['shape' => 'VpcConfig'], 'MaxUserDurationInSeconds' => ['shape' => 'Integer'], 'DisconnectTimeoutInSeconds' => ['shape' => 'Integer'], 'DeleteVpcConfig' => ['shape' => 'Boolean', 'deprecated' => \true], 'Description' => ['shape' => 'Description'], 'DisplayName' => ['shape' => 'DisplayName'], 'EnableDefaultInternetAccess' => ['shape' => 'BooleanObject'], 'DomainJoinInfo' => ['shape' => 'DomainJoinInfo'], 'AttributesToDelete' => ['shape' => 'FleetAttributes']]], 'UpdateFleetResult' => ['type' => 'structure', 'members' => ['Fleet' => ['shape' => 'Fleet']]], 'UpdateStackRequest' => ['type' => 'structure', 'required' => ['Name'], 'members' => ['DisplayName' => ['shape' => 'DisplayName'], 'Description' => ['shape' => 'Description'], 'Name' => ['shape' => 'String'], 'StorageConnectors' => ['shape' => 'StorageConnectorList'], 'DeleteStorageConnectors' => ['shape' => 'Boolean', 'deprecated' => \true], 'RedirectURL' => ['shape' => 'RedirectURL'], 'FeedbackURL' => ['shape' => 'FeedbackURL'], 'AttributesToDelete' => ['shape' => 'StackAttributes'], 'UserSettings' => ['shape' => 'UserSettingList']]], 'UpdateStackResult' => ['type' => 'structure', 'members' => ['Stack' => ['shape' => 'Stack']]], 'UserId' => ['type' => 'string', 'max' => 32, 'min' => 2], 'UserSetting' => ['type' => 'structure', 'required' => ['Action', 'Permission'], 'members' => ['Action' => ['shape' => 'Action'], 'Permission' => ['shape' => 'Permission']]], 'UserSettingList' => ['type' => 'list', 'member' => ['shape' => 'UserSetting'], 'min' => 1], 'VisibilityType' => ['type' => 'string', 'enum' => ['PUBLIC', 'PRIVATE']], 'VpcConfig' => ['type' => 'structure', 'members' => ['SubnetIds' => ['shape' => 'SubnetIdList'], 'SecurityGroupIds' => ['shape' => 'SecurityGroupIdList']]]]];
