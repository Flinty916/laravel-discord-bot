<?php
declare(strict_types=1);

namespace Nwilging\LaravelDiscordBotTests\Unit\Support\Components;

use Nwilging\LaravelDiscordBot\Support\Component;
use Nwilging\LaravelDiscordBot\Support\Components\GenericTextInputComponent;
use Nwilging\LaravelDiscordBot\Support\Components\ParagraphTextInputComponent;
use Nwilging\LaravelDiscordBotTests\TestCase;

class ParagraphTextInputComponentTest extends TestCase
{
    public function testComponent()
    {
        $label = 'label';
        $customId = 'custom-id';

        $component = new ParagraphTextInputComponent($label, $customId);

        $this->assertEquals([
            'type' => Component::TYPE_TEXT_INPUT,
            'style' => GenericTextInputComponent::STYLE_PARAGRAPH,
            'custom_id' => $customId,
            'label' => $label,
        ], $component->toArray());
    }

    public function testComponentWithOptions()
    {
        $label = 'label';
        $customId = 'custom-id';

        $minLength = 5;
        $maxLength = 10;
        $placeholder = 'test placeholder';
        $value = 'test value';

        $component = new ParagraphTextInputComponent($label, $customId);

        $component->withPlaceholder($placeholder);
        $component->withMinLength($minLength);
        $component->withMaxLength($maxLength);
        $component->withValue($value);
        $component->required();

        $this->assertEquals([
            'type' => Component::TYPE_TEXT_INPUT,
            'style' => GenericTextInputComponent::STYLE_PARAGRAPH,
            'custom_id' => $customId,
            'label' => $label,
            'min_length' => $minLength,
            'max_length' => $maxLength,
            'placeholder' => $placeholder,
            'value' => $value,
            'required' => true,
        ], $component->toArray());
    }
}
