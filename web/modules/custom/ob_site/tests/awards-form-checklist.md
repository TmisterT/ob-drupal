# Honours and Awards nomination form

- Public Awards page: `/service/awards`
- Nomination form: `/service/awards/nominate`
- Admin builder: `/admin/structure/webform/manage/honours_awards_nomination`
- Staff submissions: use the form's **Results** tab; submission access is not granted to public roles.

The reusable Webform configuration is in `config/sync/webform.webform.honours_awards_nomination.yml`.
Update `11040` installs it without replacing an existing form and connects existing Honours & Awards pages.
Future services can duplicate the form in Structure → Webforms and use their own service page's Primary action.

## Local verification

1. Open the public form while logged out and submit it empty: required fields must prevent submission.
2. Choose Kiribati Cross: witness evidence becomes visible and required. Choose another medal: it is hidden.
3. Check the form at desktop and narrow mobile widths, using keyboard navigation.
4. Test permitted document uploads, oversized/disallowed files, and private-file access as another user.
5. Submit a complete test nomination and verify the confirmation reference and restricted Results access.

## Administration

Set the current nomination window in Webform Settings and keep the Awards service page dates consistent.
Review medal choices and supporting-evidence requirements with the Awards team before public launch.
No email handlers are installed: add verified staff notifications under Settings → Emails/Handlers if required.
Completed submissions are stored in Drupal; the form does not create an approval workflow.

Reference: https://www.pso.gov.ki/honors-and-awards-2025/
